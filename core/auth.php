<?php
require_once 'database.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $pdo->prepare("
        SELECT *, 'guru' AS role FROM `guru` WHERE username = :username
        UNION
        SELECT *, 'admin' AS role FROM `admin` WHERE username = :username
    ");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] === 'admin') {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/admin_dashboard.php");
            exit();
        } elseif ($user['role'] === 'guru') {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/dashboard.php");
            exit();
        }

    } else {
        $error = "Invalid username or password.";
    }


}
?>