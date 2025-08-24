<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../core/database.php';

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $stmt = $pdo->prepare("INSERT INTO siswa (nama, id_kelas) VALUES (?, ?)");
    $stmt->execute([$nama, $kelas]);

    header("Location: ../../views/siswa.php");
    exit();
}

?>