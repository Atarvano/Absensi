<?php

require_once '../../core/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO guru (nama, username, password) VALUES (:nama, :username, :password)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    header("Location: ../../views/guru.php");
    exit();
}

?>