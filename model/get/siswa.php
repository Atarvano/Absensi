<?php

require_once '../core/database.php';


$searchNama = isset($_GET['nama']) && $_GET['nama'] !== '' ? $_GET['nama'] : null;
if ($searchNama) {
    $stmt = $pdo->prepare("SELECT s.id, s.nama, k.nama_kelas FROM siswa s JOIN kelas k ON s.id_kelas = k.id WHERE s.nama LIKE :nama");
    $likeNama = "%" . $searchNama . "%";
    $stmt->bindParam(':nama', $likeNama, PDO::PARAM_STR);
    $stmt->execute();
    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->prepare("SELECT s.id, s.nama, k.nama_kelas FROM siswa s JOIN kelas k ON s.id_kelas = k.id");
    $stmt->execute();
    $siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$stmt2 = $pdo->prepare("SELECT * FROM kelas");
$stmt2->execute();
$kelas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>