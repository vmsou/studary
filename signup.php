<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studary | Criar Conta</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<?php
    include "php/db-connection.php";

    if (isset($_REQUEST["username"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $username = stripslashes($_POST["username"]);
        $username = mysqli_real_escape_string($db, $username);

        $password = stripslashes($_POST["password"]);
        $password = mysqli_real_escape_string($db, $password);
        $hash = md5($password);
        
        // Check if user already exists
        $stmt = "SELECT * FROM tbUser WHERE username = '$username'";
        $user_result = $db->query($stmt) or die(mysql_error());
        $count = mysqli_num_rows($user_result);
        if ($count == 1) {
            echo "<div class='alert'>
                  <h3>Usuário existente.</h3><br/>
                  </div>";
        } else {
            // Insert user into database
            $stmt = "INSERT INTO tbUser (username, password) VALUES ('$username', '$hash')";
            $insert_result = $db->query($stmt);

            if ($insert_result) {
                $row = mysqli_fetch_array($user_result);
                $_SESSION["username"] = $row["username"];
                header("Location: index.php");
            } else {
                echo "<div class='alert'>
                  <h3>Não foi possivel cadastrar conta.</h3><br/>
                  </div>";
            }
        }
    }
?>
    <div class="login center-self">
        <img src="img/logo.png" alt="">
        <form class="login-form" method="post">
            <input type="text" name="username" placeholder="Nome de usuário">
            <input type="password" name="password" placeholder="Senha">
            <input type="submit" value="Cadastrar">
            <a href="signin.php">Já possui uma conta?</a>
        </form>
    </div>
</body>
</html>