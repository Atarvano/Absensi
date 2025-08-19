<?php
session_start();

if (isset($_SESSION['login'])) {
    require 'views/dashboard.php';
} else {
    require 'views/login.php';
}


?>