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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php include "php/html-header.php"; ?>
    <?php
        if (isset($_GET["course"])) {
            $course = htmlspecialchars($_GET["course"]);
            echo "<h2>$course</h2>";
        } else {
            echo "<script>
                    window.location.href = 'index.php';
                </script>";
            exit();
        }
    ?>
</body>
</html>