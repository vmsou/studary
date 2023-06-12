<?php
    include "db-connection.php";
    if (isset($_GET["course"])) {
        $course = htmlspecialchars($_GET["course"]);

        $stmt = "SELECT course FROM tbCourse WHERE course = '$course'";
        $select_course = $db->query($stmt);
        if ($select_course->num_rows == 0) {
            echo "<script> window.location.href = 'index.php'; </script>";
            exit();
        }
        
        $questionsArray = array();

        $stmt = "SELECT id_question, question FROM tbQuestion WHERE course = '$course'";
        $select_question = $db->query($stmt);
        while ($questionRow = $select_question->fetch_array(MYSQLI_ASSOC)) {
            $id_question = $questionRow["id_question"];
            $question = $questionRow["question"];

            $questionJSON = array();
            $questionJSON["question"] = $question;

            $stmt = "SELECT text, result FROM tbAnswer WHERE id_question = $id_question";
            $select_answer = $db->query($stmt);

            
            $questionJSON["answers"] = array();
            while ($answerRow = $select_answer->fetch_array(MYSQLI_ASSOC)) {
                $answerJSON = array();
                $answerJSON["text"] = $answerRow["text"];
                $answerJSON["result"] = $answerRow["result"];
                $questionJSON["answers"][] = $answerJSON;
            }

            $questionsArray[] = $questionJSON;
        }

        $jsonData = json_encode($questionsArray);
        echo $jsonData;
    }
?>