<?php 
    session_unset();
    session_destroy();
    header("Location: /lab03/index.php");
?>