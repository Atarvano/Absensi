<?php

require_once '../core/database.php';

$stmt = $pdo->prepare("SELECT s.id, s.nama, k.nama_kelas FROM siswa s JOIN kelas k ON s.id_kelas = k.id");
$stmt->execute();
$siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>