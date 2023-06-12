<?php 
  $username = $_SESSION['username'];
  echo "<header class='header'>
  <img src='img/logo.png' alt='Logo' class='logo'>
  <div class='context-menu'>
    <a href='index.php'>Disciplinas</button>
    <a href=''>Provas</button>
    <a href=''>Exercicios</button>
    <a href=''>Sobre</button>
  </div>
  <div class='dropdown'>
    <button class='dropdown-item'> $username </button>
    <div class='dropdown-content'>
      <a href='#'><span>Profile</span></a>
      <a href='logout.php'><span>Logout</span></a>
    </div>
  </div>
  </header>";
?>