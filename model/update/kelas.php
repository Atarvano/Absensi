<?php
require_once '../../core/database.php';


$stmt = $pdo->prepare("SELECT * FROM kelas WHERE id = ?");
$stmt->execute([$_GET['id']]);
$kelas = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $kelas = $_POST['kelas'];

    $stmt = $pdo->prepare("UPDATE kelas SET nama_kelas = ? WHERE id = ?");
    $stmt->execute([$kelas, $_POST['id']]);

    header("Location: ../../views/kelas.php");
    exit();
}

?>