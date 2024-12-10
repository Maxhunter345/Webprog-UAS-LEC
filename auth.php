<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <img src="assets/Logo SMA.png" alt="Logo SMA" class="auth-logo">
            <h2>Selamat Datang di<br>SMA Negeri 6 Tangerang</h2>
            <div class="auth-buttons">
                <a href="register.php" class="auth-btn">Register</a>
                <a href="login.php" class="auth-btn">Login</a>
            </div>
        </div>
    </div>
</body>
</html>