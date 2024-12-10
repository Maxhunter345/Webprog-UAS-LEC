<?php
session_start();
require_once 'db_config.php';

// Fetch history content from database
$stmt = $pdo->prepare("SELECT content FROM school_profile WHERE category = 'history'");
$stmt->execute();
$history = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-image">
                <img src="assets/Logo SMA.png" alt="Hero Image">
            </div>
            <h1>SMA NEGERI 6 TANGERANG</h1>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section class="sejarah-container">
        <h1>Sejarah</h1>
        <div class="sejarah-card">
            <div class="sejarah-column">
                <?php if ($history): ?>
                    <?php echo nl2br(htmlspecialchars($history['content'])); ?>
                <?php else: ?>
                    <p>Konten sejarah sedang dalam proses pembaruan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'includes/social_media.php'; ?>
    <?php include 'includes/footer.php'; ?>
    
    <script src="script.js"></script>
</body>
</html>