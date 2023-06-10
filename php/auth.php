<?php
    include "db-connection.php";
    session_start();
    
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
            $data["error"] = FALSE;
            $data["url"] = "pages\dashboard.html";
            $data["username"] = $username;
        } else {
            $data["error"] = TRUE;
            $data["password"] = $hash;
        }
        $JSON_OBJ = json_encode($data);
        echo $JSON_OBJ;
    }
?>