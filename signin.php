<?php
    session_start();
    include "php/db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
            $username = stripslashes($_POST["username"]);
            $username = mysqli_real_escape_string($db, $username);

            $password = stripslashes($_POST["password"]);
            $password = mysqli_real_escape_string($db, $password);
            $hash = md5($password);

            $stmt = "SELECT * FROM tbUser WHERE username = '$username' AND password = '$hash'";
            $select_result = $db->query($stmt) or die(mysql_error());
            if ($select_result->num_rows) {
                $row = $select_result->fetch_assoc();
                $_SESSION["username"] = $row["username"];
                echo "<script>
                    window.location.href = 'index.php';
                </script>";
                exit();
            } else {
                echo "<script>
                    alertModal('error', 'Usuário e/ou senha incorreto(s). Tente Novamente.');
                    document.currentScript.remove();
                </script>";
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
