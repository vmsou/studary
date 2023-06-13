<?php
    session_start();
    if(session_destroy()) exit(header("Location: index.php"));
?>