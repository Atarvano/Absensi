<?php
require_once 'database.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $pdo->prepare("
    SELECT id, username, password, nama, 'guru' AS role 
    FROM guru WHERE username = :username
    UNION
    SELECT id, username, password, nama, 'admin' AS role 
    FROM admin WHERE username = :username
");

    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        if ($user['role'] === 'admin') {
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/dashboard.php");
            exit();
        } elseif ($user['role'] === 'guru') {
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/dashboard.php");
            exit();
        }

    } else {
        $error = "Invalid username or password.";
    }


}
?>