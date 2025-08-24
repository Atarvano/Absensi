<?php

require_once '../core/database.php';

$stmt = $pdo->prepare("SELECT * FROM kelas");
$stmt->execute();
$kelas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>