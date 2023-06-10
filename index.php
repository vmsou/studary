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
</head>
<body>
    <p>Olá, <?php echo $_SESSION['username']; ?>!</p>
    <p>Você está na pagina de conteúdo.</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>