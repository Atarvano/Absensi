<?php
require_once '../../core/database.php';

$stmt = $pdo->prepare("SELECT * FROM guru WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$guru = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $stmt = $pdo->prepare("UPDATE guru SET nama = ?, username = ?, password = ? WHERE id = ?");
    $stmt->execute([$nama, $username, $password, $_POST['id']]);

    header("Location: ../../views/guru.php");
    exit();
}
?>