<?php

require_once '../../core/database.php';

$stmt = $pdo->prepare("DELETE FROM keterlambatan WHERE id = :id");
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
header("Location: ../../views/dashboard.php");
exit();

?>