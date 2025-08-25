<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}



if (isset($_SESSION['login'])) {
    header('Location: views/dashboard.php');
} else {
    header('Location: views/login.php');
}


?>