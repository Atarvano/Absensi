<?php
require_once 'database.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = ($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM guru WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../views/dashboard.php");
        exit();

    } else {
        echo "Hashed input password: " . password_hash($password, PASSWORD_DEFAULT);
    }


}
?>