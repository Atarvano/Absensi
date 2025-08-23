<?php

require_once '../core/database.php';

$stmt = $pdo->prepare("SELECT * FROM guru");
$stmt->execute();
$keterlambatan = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>