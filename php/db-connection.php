<?php
    $DB_HOST = getenv('MYSQLHOST');
    $DB_USER = getenv('MYSQLUSER');
    $DB_PASS = getenv('MYSQLPASSWORD');
    $DB_NAME = getenv('MYSQLDATABASE');

    mysqli_report(MYSQLI_REPORT_ERROR  | MYSQLI_REPORT_STRICT);
    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
?>