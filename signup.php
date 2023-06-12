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
    <title>Studary | Criar Conta</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        if (isset($_REQUEST["username"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $username = stripslashes($_POST["username"]);
            $username = mysqli_real_escape_string($db, $username);
    
            $password = stripslashes($_POST["password"]);
            $password = mysqli_real_escape_string($db, $password);
            $hash = md5($password);
            
            // Check if user already exists
            $stmt = "SELECT * FROM tbUser WHERE username = '$username'";
            $select_result = $db->query($stmt) or die(mysql_error());
            if ($select_result->num_rows == 1) {
                echo "<script>
                    alertModal('error', 'Usuário Existente. Tente outro nome de usuário.');
                    document.currentScript.remove();
                </script>";
            } else {
                // Insert user into database
                $stmt = "INSERT INTO tbUser (username, password) VALUES ('$username', '$hash')";
                $insert_result = $db->query($stmt);
    
                if ($insert_result) {
                    $row = $select_result->fetch_assoc();
                    echo "<script>
                        alertModal('success', 'Conta cadastrada.');

                        setTimeout(() => {
                            window.location.href = 'index.php';
                        }, 1000);
                        
                    </script>";

                } else {
                    echo "<script>
                        alertModal('error', 'Não foi possível cadastrar. Tente Novamente.');
                        document.currentScript.remove();
                    </script>";
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