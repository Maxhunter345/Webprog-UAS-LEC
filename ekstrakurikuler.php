<?php
session_start();
require_once 'db_config.php';

// Fetch ekstrakurikuler data
$stmt = $pdo->query("SELECT * FROM extracurriculars ORDER BY name");
$ekstrakurikuler = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - SMA Negeri 6 Tangerang</title>
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

    <!-- Ekstrakurikuler Section -->
    <section class="ekstrakurikuler-detail" id="ekstrakurikuler-detail">
        <h2>Ekstrakurikuler</h2>
        <div class="ekstrakurikuler-container">
            <button class="prev-btn" onclick="changeExtracurricular(-1)">←</button>
            <?php foreach($ekstrakurikuler as $index => $ekskul): ?>
            <div class="ekstrakurikuler-card" data-ekskul-id="<?php echo $ekskul['id']; ?>" 
                 style="display: <?php echo $index === 0 ? 'flex' : 'none'; ?>">
                <div class="ekstrakurikuler-symbol">
                    <img src="<?php echo htmlspecialchars($ekskul['icon_path']); ?>" 
                         alt="<?php echo htmlspecialchars($ekskul['name']); ?>" 
                         class="symbol-img">
                </div>
                <div class="ekstrakurikuler-text">
                    <h3><?php echo htmlspecialchars($ekskul['name']); ?></h3>
                    <p class="ekstrakurikuler-description">
                        <?php echo htmlspecialchars($ekskul['description']); ?>
                    </p>
                    <p id="ekstrakurikuler-description-<?php echo $ekskul['id']; ?>" 
                       class="ekstrakurikuler-description" style="display:none;">
                        <?php echo htmlspecialchars($ekskul['description']); ?>
                    </p>
                    <button class="btn-detail" id="detail-btn-<?php echo $ekskul['id']; ?>" 
                            onclick="toggleDescription(<?php echo $ekskul['id']; ?>)">
                        Detail
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
            <button class="next-btn" onclick="changeExtracurricular(1)">→</button>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="fitur">
        <div class="feature-cards">
            <a href="prestasi.php" class="feature-card">
                <img src="assets/prestasi.svg" alt="Prestasi">
                <h3>Prestasi</h3>
            </a>
            <a href="ekstrakurikuler.php" class="feature-card">
                <img src="assets/ekstrakurikuler.svg" alt="Ekstrakurikuler">
                <h3>Ekstrakurikuler</h3>
            </a>
            <a href="#" class="feature-card">
                <img src="assets/elearning.svg" alt="E-Learning">
                <h3>E-Learning</h3>
            </a>
            <a href="#" class="feature-card">
                <img src="assets/enews.svg" alt="E-News">
                <h3>E-News</h3>
            </a>
            <a href="#" class="feature-card">
                <img src="assets/elibrary.svg" alt="E-Library">
                <h3>E-Library</h3>
            </a>
        </div>
    </section>

    <?php include 'includes/social_media.php'; ?>
    <?php include 'includes/footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>