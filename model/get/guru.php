<?php
require_once '../core/database.php';

$stmt = $pdo->prepare("SELECT * FROM guru");
$stmt->execute();
$guru = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>