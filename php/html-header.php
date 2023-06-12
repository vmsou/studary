<?php 
  $username = $_SESSION['username'];
  echo "<header class='header'>
  <img src='img/logo.png' alt='Logo' class='logo'>
  <div class='context-menu'>
    <button class='context-menu-button'>Disciplinas</button>
    <button class='context-menu-button'>Provas</button>
    <button class='context-menu-button'>Exercicios</button>
    <button class='context-menu-button'>Sobre</button>
  </div>
  <div class='dropdown'>
    <button class='dropdown-item'> $username </button>
    <div class='dropdown-content'>
      <a href='#'>Profile</a>
      <a href='logout.php'>Logoff</a>
    </div>
  </div>
  </header>";
?>