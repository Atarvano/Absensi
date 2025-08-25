<?php
require_once '../../core/database.php';

$stmt = $pdo->prepare("SELECT * FROM keterlambatan WHERE id = ?");
$stmt->execute([$_GET['id']]);
$keterlambatan = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $alasan = $_POST['alasan'];

    $stmt = $pdo->prepare("UPDATE keterlambatan SET tanggal = ?, alasan = ? WHERE id = ?");
    $stmt->execute([$tanggal, $alasan, $_POST['id']]);
    header("Location: ../../views/dashboard.php");
    exit;
}
?>