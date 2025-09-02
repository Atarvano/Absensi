<?php
require_once '../core/database.php';

$searchNama = isset($_GET['nama']) && $_GET['nama'] !== '' ? $_GET['nama'] : null;
if ($searchNama) {
    $stmt = $pdo->prepare("SELECT * FROM guru WHERE nama LIKE :nama");
    $likeNama = "%" . $searchNama . "%";
    $stmt->bindParam(':nama', $likeNama, PDO::PARAM_STR);
    $stmt->execute();
    $guru = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->prepare("SELECT * FROM guru");
    $stmt->execute();
    $guru = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>