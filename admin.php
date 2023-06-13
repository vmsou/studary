<?php
    include "php/session.php";
    
    if(isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
        exit(header("Location: index"));
    }

    include "php/db-connection.php";

    if (isset($_REQUEST["course"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $course = stripslashes($_POST["course"]);
        $course = mysqli_real_escape_string($db, $course);

        $stmt = "SELECT course FROM tbCourse WHERE course = '$course'";
        $select_result = $db->query($stmt);

        if ($select_result->num_rows == 0) {
            $stmt = "INSERT INTO tbCourse (course) VALUES ('$course')";
            $insert_result = $db->query($stmt);
        }

        $question = stripslashes($_POST["question"]);
        $question = mysqli_real_escape_string($db, $question);

        $stmt = "SELECT id_question FROM tbQuestion WHERE question = '$question'";
        $select_result = $db->query($stmt);

        if ($select_result->num_rows == 0) {
            $stmt = "INSERT INTO tbQuestion (course, question) VALUES ('$course', '$question')";
            $insert_result = $db->query($stmt);
        }

        $stmt = "SELECT id_question FROM tbQuestion WHERE question = '$question'";
        $select_result = $db->query($stmt);

        $id_question = $select_result->fetch_assoc()["id_question"];

        $correctAnswer = stripslashes($_POST["correctAnswer"]);
        $correctAnswer = mysqli_real_escape_string($db, $correctAnswer);

        $stmt = "INSERT INTO tbAnswer (id_question, text, result) VALUES ($id_question, '$correctAnswer', TRUE)";
        $insert_result = $db->query($stmt);

        foreach($_POST['incorrectAnswer'] as $incorrectAnswer) {
            $stmt = "INSERT INTO tbAnswer (id_question, text, result) VALUES ($id_question, '$incorrectAnswer', FALSE)";
            $insert_result = $db->query($stmt);
        }

        echo "<script>
            alertModal('success', 'Pergunta registrada.');

            setTimeout(() => {
                window.location.href = 'admin';
            }, 1000);    
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Admin</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/main.js"></script>
</head>
<body>
    <div class="login center-self">
        <h2>Question</h2>
        <form class="login-form" method="post" name="login">
            <input type="text" name="course" placeholder="Nome de curso">
            <input type="text" name="question" placeholder="Enunciado">
            <input type="text" name="correctAnswer" placeholder="Resposta Correta">
            <input type="text" name="incorrectAnswer[]" placeholder="Resposta Incorreta #1">
            <input type="text" name="incorrectAnswer[]" placeholder="Resposta Incorreta #2">
            <input type="text" name="incorrectAnswer[]" placeholder="Resposta Incorreta #3">
            <input type="submit" value="Enviar" name="submit">
        </form>

    </div>
</body>
</html>