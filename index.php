<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: views/login.php');
    exit();
}

if (isset($_SESSION['login'])) {
    header('Location: views/dashboard.php');
    exit();
}
?>