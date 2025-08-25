<?php
require_once '../../core/database.php';

if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];

    $stmt1 = $pdo->prepare("SELECT nama,id FROM siswa WHERE id_kelas = :id_kelas ");
    $stmt1->bindParam(':id_kelas', $kelas);
    $stmt1->execute();

    $nama = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($nama as $n) {
        echo "<option value=\"{$n['id']}\">{$n['nama']}</option>";
    }
}


if (isset($_POST['submit'])) {
    $siswa = htmlspecialchars($_POST['siswa']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $alasan = htmlspecialchars($_POST['alasan']);

    $stmt = $pdo->prepare("INSERT INTO keterlambatan (id_siswa, alasan, tanggal) VALUES (?, ?, ?)");
    if ($stmt->execute([$siswa, $alasan, $tanggal])) {
        header("Location: ../../views/kelas.php");
    }

}