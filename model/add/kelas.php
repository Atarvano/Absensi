<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../core/database.php';

    $nama_kelas = htmlspecialchars($_POST['nama_kelas']);

    $stmt = $pdo->prepare("INSERT INTO kelas (nama_kelas) VALUES (:nama_kelas)");
    $stmt->bindParam(':nama_kelas', $nama_kelas);

    if ($stmt->execute()) {
        header("Location: ../../views/kelas.php");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}


?>