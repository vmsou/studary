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
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include "php/html-header.php"; ?>

    <h1 class="center">Disciplinas</h1>
    <div class="container">
        <div class="box">
            <h3>Inglês</h3>
            <p>Exercicios e Simulados destinado a matéria de Inglês</p>
            <a href="english.php"><button>Entrar</button></a>
            <a href="exam.php?course=english"><button>Prova</button></a>
        </div>
        <div class="box">
            <h3>Português</h3>
            <p>Exercicios e Simulados destinado a matéria de Português</p>
            <a href="english.php"><button>Entrar</button></a>
            <a href="exam.php?course=portuguese"><button>Prova</button></a>
        </div>
        <div class="box">
            <h3>Geografia</h3>
            <p>Exercicios e Simulados destinado a matéria de Geografia</p>
            <a href="english.php"><button>Entrar</button></a>
            <a href="exam.php?course=geography"><button>Prova</button></a>
        </div>
    </div>
</body>
</html>