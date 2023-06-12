<?php
    include "php/session.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Inglês</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <header class="header">
    <img src="img/logo.png" alt="Logo" class="logo">
    <div class="context-menu">
      <button class="context-menu-button">Prova</button>
      <button class="context-menu-button">Disciplinas</button>
      <button class="context-menu-button">Home</button>
    </div>
    <div class="dropdown">
      <button class="dropdown-item"><?php echo $_SESSION['username']; ?></button>
      <div class="dropdown-content">
        <a href="#">Profile</a>
        <a href="logout.php">Logoff</a>
      </div>
    </div>
  </header>

  <div class="main-content">
    <div class="left-section">
      <h2>Inglês <button>Prova</button></h2>
      <ul>
        <li class="active"><a>Inglês Básico 1</a></li>
        <li><a>Inglês Básico 2</a></li>
        <li><a>Inglês Básico 3</a></li>
        <li><a>Inglês Intermediário 1</a></li>
        <li><a>Inglês Intermediário 2</a></li>
        <li><a>Inglês Avançado</a></li>
      </ul>
    </div>
    <div class="right-section">
      <h2>Verbo "To Be"</h2>
      <p>
        O verbo "to be" é um dos verbos mais importantes em inglês. Ele é usado para indicar o estado,
        identidade, localização ou características de algo ou alguém. Em português, pode ser traduzido
        como "ser" ou "estar", dependendo do contexto.
        <br><br>
        Exemplo de uso:
        <br>
        - I am a student. (Eu sou um estudante.)
        <br>
        - The book is on the table. (O livro está na mesa.)
      </p>
    </div>
  </div>
</body>
</html>
