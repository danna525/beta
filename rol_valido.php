<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION["rol"])){
        header('Location: ../index.php');
    }
?>
