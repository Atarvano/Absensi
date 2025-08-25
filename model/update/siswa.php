`
<?php
require_once '../../core/database.php';


$stmt = $pdo->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->execute([$_GET['id']]);
$siswa = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $pdo->prepare("SELECT * FROM kelas");
$stmt2->execute();
$kelas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $id = $_POST['id'];
    $id_kelas = $_POST['kelas'];

    $stmt3 = $pdo->prepare("UPDATE `siswa` SET `nama` = ?, `id_kelas` = ? WHERE `id` = ?");
    $stmt3->execute([$nama, $id_kelas, $id]);

    header("Location: ../../views/siswa.php");
    exit();
}
?>`