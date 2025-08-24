<?php
require_once '../../core/database.php';
$stmt = $pdo->prepare("DELETE FROM siswa WHERE id_kelas = ?");
$stmt->execute([$_GET['id']]);

$stmt = $pdo->prepare("DELETE FROM kelas WHERE id = ?");
$stmt->execute([$_GET['id']]);

header("Location: ../../views/kelas.php");
exit();

?>