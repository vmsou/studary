<?php
    include "db-connection.php";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT username, password FROM tbUser WHERE username = '?' AND password = '?'");
    $stmt->execute([$username, $hash]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($user) && !empty($user)) {
        echo TRUE;
    } else {
        echo FALSE;
    }
?>