<?php
// admin_dashboard.php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if user is admin (you'll need to add an 'is_admin' column to your users table)
$stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user || !$user['is_admin']) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo-container">
                <img src="assets/Logo SMA.png" alt="SMA Negeri 6 Tangerang">
                <h1>Admin Dashboard</h1>
            </div>
            <ul class="nav-links">
                <li><a href="admin_users.php">Manage Users</a></li>
                <li><a href="admin_content.php">Manage Content</a></li>
                <li><a href="admin_news.php">Manage News</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="admin-content">
        <h2>Welcome to Admin Dashboard</h2>
        <!-- Add your admin dashboard content here -->
    </main>

    <footer>
        <p>&copy; 2024 SMA Negeri 6 Tangerang</p>
    </footer>
</body>
</html>
