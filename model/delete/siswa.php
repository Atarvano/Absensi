<?php
require_once '../../core/database.php';
$stmt = $pdo->prepare("DELETE FROM siswa WHERE id = ?");
$stmt->execute([$_GET['id']]);

header("Location: ../../views/siswa.php");
exit();
