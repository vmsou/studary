<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
    session_start();
    include "php/db-connection.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
        $username = stripslashes($_POST["username"]);
        $username = mysqli_real_escape_string($db, $username);

        $password = stripslashes($_POST["password"]);
        $password = mysqli_real_escape_string($db, $password);
        $hash = md5($password);

        $stmt = "SELECT * FROM tbUser WHERE username = '$username' AND password = '$hash'";
        $result = $db->query($stmt) or die(mysql_error());
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            session_regenerate_id();
            $row = mysqli_fetch_array($result);
            $_SESSION["username"] = $row["username"];
            header("Location: index.php");
        } else {
            echo "<div class='alert'>
                  <h3>Usuário e/ou Senha incorretas.</h3><br/>
                  </div>";
        }
    }
?>
    <div class="login center-self">
        <img src="img/logo.png" alt="">
        <form class="login-form" method="post" name="login">
            <input type="text" name="username" placeholder="Nome de usuário">
            <input type="password" name="password" placeholder="Senha">
            <input type="submit" value="Entrar" name="submit">
            <a href="#">Esqueceu a senha?</a>
            <a href="signup.php">Criar conta</a>
        </form>
    </div>
</body>
</html>
