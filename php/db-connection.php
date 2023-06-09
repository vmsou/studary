<?php
    $HOST = "localhost:3306";
    $USER = "root";
    $PASSWORD = "";
    $DB_NAME = "studaryDB";

    mysqli_report(MYSQLI_REPORT_ERROR  | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli($HOST, $USER, $PASSWORD, $DB_NAME);
?>