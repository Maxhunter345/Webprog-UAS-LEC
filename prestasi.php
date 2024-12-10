<?php
// prestasi.php
session_start();
require_once 'db_config.php';

// Fetch achievements data
$stmt = $pdo->query("SELECT * FROM achievements ORDER BY achievement_date DESC");
$achievements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Prestasi - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section class="prestasi" id="prestasi">
        <h2>Prestasi</h2>
        <div class="prestasi-wrapper">
            <div class="prestasi-cards">
                <?php foreach($achievements as $achievement): ?>
                <div class="prestasi-card-container">
                    <div class="prestasi-card">
                        <div class="prestasi-image">
                            <img src="<?php echo htmlspecialchars($achievement['image_path']); ?>" 
                                 alt="<?php echo htmlspecialchars($achievement['title']); ?>">
                        </div>
                        <div class="prestasi-content">
                            <h3><?php echo htmlspecialchars($achievement['title']); ?></h3>
                            <p><?php echo htmlspecialchars($achievement['description']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>