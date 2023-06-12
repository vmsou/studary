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
    <script src="js/main.js"></script>
    <script src="js/exam.js"></script>
</head>
<body>
    <?php include "php/html-header.php"; ?>
    
    <div class="exam">
        <h1>Simulado <span id="question-count">?</span></h1>
        <div class="quiz">
            <h2 class="question" id="question">Pergunta aqui.</h2>
            <div class="answer-btns" id="answer-btns">
            </div>
            <div class="quiz-navigation">
                <button id="back-btn">‹</button>
                <span id="question-number">1</span>
                <button id="next-btn">›</button>
            </div>
            <div class="quiz-result">
                <button id="end-quiz">Finalizar</button>
            </div>
        </div>
    </div>
</body>
</html>