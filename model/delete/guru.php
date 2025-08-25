<?php
require_once '../../core/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM guru WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../../views/guru.php");
    exit();
}
?>