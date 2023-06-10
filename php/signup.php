<?php
    include "db-connection.php";

    if (isset($_REQUEST["username"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $username = stripslashes($_POST["username"]);
        $username = mysqli_real_escape_string($db, $username);

        $password = stripslashes($_POST["password"]);
        $password = mysqli_real_escape_string($db, $password);
        $hash = md5($password);
        
        // Check if user already exists
        $stmt = "SELECT * FROM tbUser WHERE username = '$username'";
        $result = $db->query($stmt) or die(mysql_error());
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $data["error"] = TRUE;
        } else {
            // Insert user into database
            $stmt = "INSERT INTO tbUser (username, password) VALUES ('$username', '$hash')";
            $result = $db->query($stmt);

            if ($result) {
                $data["error"] = FALSE;
                $data["url"] = "../pages/dashboard.html";
                $data["username"] = $username;
            } else {
                $data["error"] = TRUE;
            }
        }

        $JSON_OBJ = json_encode($data);
        echo $JSON_OBJ;
    }
?>