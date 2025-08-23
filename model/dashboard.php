<?php

require_once '../core/database.php';

$stmt = $pdo->prepare("SELECT kt.id, s.nama, k.nama_kelas, kt.alasan, kt.tanggal FROM keterlambatan kt 
JOIN siswa s ON kt.id_siswa = s.id JOIN kelas k ON s.id_kelas = k.id");
$stmt->execute();
$keterlambatan = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>