<?php
    include "db-connection.php";
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = "SELECT * FROM tbUser WHERE username = '$username' AND password = '$hash'";
        $result = $db->query($stmt);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            session_regenerate_id();
            $row = mysqli_fetch_array($result);
            $_SESSION["username"] = $row["username"];
            echo "Sucesso";
        } else {
            echo "Falhou";
        }
    }
    
?>