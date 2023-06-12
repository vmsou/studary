<?php
    include "php/session.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/exam.css">
</head>
<body>
    <?php include "php/html-header.php"; ?>
    <?php
        if (isset($_GET["course"])) {
            $course = htmlspecialchars($_GET["course"]);
        } else {
            echo "<script>
                    window.location.href = 'index.php';
                </script>";
            exit();
        }
    ?>

    <div class="exam">
        <h1>Simulado</h1>
        <div class="quiz">
            <h2 class="question">Pergunta aqui.</h2>
            <div class="answer-btns">
                <button class="answer-btn">Resposta 1</button>
                <button class="answer-btn">Resposta 2</button>
                <button class="answer-btn">Resposta 3</button>
                <button class="answer-btn">Resposta 4</button>
            </div>
            <div class="quiz-navigation">
                <button id="back-btn">‹</button>
                <span id="curr-question">1</span>
                <button id="next-btn">›</button>
            </div>
        </div>
    </div>
</body>
</html>