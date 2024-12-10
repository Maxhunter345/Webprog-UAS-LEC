<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Check if user is admin
    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    
    if ($user && $user['is_admin']) {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: dashboard.php");
    }
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
?>