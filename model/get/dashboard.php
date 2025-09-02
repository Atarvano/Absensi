<?php

require_once '../core/database.php';

$searchNama = isset($_GET['nama']) && $_GET['nama'] !== '' ? $_GET['nama'] : null;
if ($searchNama) {
    $stmt = $pdo->prepare("SELECT kt.id, s.nama, k.nama_kelas, kt.alasan, kt.tanggal FROM keterlambatan kt JOIN siswa s ON kt.id_siswa = s.id JOIN kelas k ON s.id_kelas = k.id WHERE s.nama LIKE :nama");
    $likeNama = "%" . $searchNama . "%";
    $stmt->bindParam(':nama', $likeNama, PDO::PARAM_STR);
    $stmt->execute();
    $keterlambatan = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->prepare("SELECT kt.id, s.nama, k.nama_kelas, kt.alasan, kt.tanggal FROM keterlambatan kt JOIN siswa s ON kt.id_siswa = s.id JOIN kelas k ON s.id_kelas = k.id");
    $stmt->execute();
    $keterlambatan = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>