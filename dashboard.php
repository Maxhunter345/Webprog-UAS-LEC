<?php
session_start();
require_once 'db_config.php';

// Fetch recent news
$stmt = $pdo->query("SELECT * FROM news ORDER BY publish_date DESC LIMIT 2");
$news = $stmt->fetchAll();

// Fetch achievements
$stmt = $pdo->query("SELECT * FROM achievements ORDER BY achievement_date DESC LIMIT 2");
$achievements = $stmt->fetchAll();

// Fetch first extracurricular
$stmt = $pdo->query("SELECT * FROM extracurriculars ORDER BY id ASC LIMIT 1");
$extracurricular = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website SMA Negeri 6 Tangerang</title>
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

    <!-- News Section -->
    <section class="news">
        <div class="news-cards">
            <?php foreach ($news as $item): ?>
            <div class="news-card" data-news-id="<?php echo $item['id']; ?>">
                <img src="<?php echo htmlspecialchars($item['image_path']); ?>" 
                     alt="<?php echo htmlspecialchars($item['title']); ?>">
                <div class="news-content">
                    <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                    <p>
                        <?php echo htmlspecialchars(substr($item['content'], 0, 200)) . '...'; ?>
                        <span class="btn-arrow">→</span>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="prestasi" id="prestasi">
        <h2>Prestasi</h2>
        <div class="prestasi-wrapper">
            <div class="prestasi-cards">
                <?php foreach ($achievements as $index => $achievement): ?>
                <div class="prestasi-card-container">
                    <?php if ($index === 0): ?>
                    <button class="before-btn" onclick="changePrestasi(-1)">&#8592;</button>
                    <?php else: ?>
                    <button class="after-btn" onclick="changePrestasi(1)">&#8594;</button>
                    <?php endif; ?>
                    <div class="prestasi-card">
                        <div class="prestasi-image">
                            <img src="<?php echo htmlspecialchars($achievement['image_path']); ?>" 
                                 alt="<?php echo htmlspecialchars($achievement['title']); ?>">
                        </div>
                        <div class="prestasi-content">
                            <h3><?php echo htmlspecialchars($achievement['title']); ?></h3>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Extracurricular Section -->
    <?php if ($extracurricular): ?>
    <section class="ekstrakurikuler-detail" id="ekstrakurikuler-detail">
        <h2>Ekstrakurikuler</h2>
        <div class="ekstrakurikuler-container">
            <button class="prev-btn" onclick="changeExtracurricular(-1)">&#8592;</button>
            <div class="ekstrakurikuler-card">
                <div class="ekstrakurikuler-symbol">
                    <img src="<?php echo htmlspecialchars($extracurricular['icon_path']); ?>" 
                         alt="<?php echo htmlspecialchars($extracurricular['name']); ?>" 
                         class="symbol-img">
                </div>
                <div class="ekstrakurikuler-text">
                    <h3><?php echo htmlspecialchars($extracurricular['name']); ?></h3>
                    <p class="ekstrakurikuler-description">
                        <?php echo htmlspecialchars($extracurricular['description']); ?>
                    </p>
                    <button class="btn-detail" id="detail-btn" 
                            onclick="toggleDescription('<?php echo $extracurricular['id']; ?>')">
                        Detail
                    </button>
                </div>
            </div>
            <button class="next-btn" onclick="changeExtracurricular(1)">&#8594;</button>
        </div>
    </section>
    <?php endif; ?>

    <!-- Contact and Maps Section -->
    <section class="maps-card" id="maps-detail">
        <h2>SMA Negeri 6 Tangerang</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.313120572602!2d106.62419651469712!3d-6.1746997610913725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42a28ad70f5205%3A0x1180d2d56abfe545!2sSMA%20Negeri%206%20Tangerang!5e0!3m2!1sen!2sid!4v1687765227573!5m2!1sen!2sid" 
                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
        <div class="school-contact">
            <p><strong>Alamat:</strong> Jln. Nyimas Melati No. 2 Karanganyar Neglasari Kota Tangerang 15121</p>
            <p><strong>No. Telpon:</strong> (021) 5587229
            <strong>Email:</strong> sman6tangerangkota@gmail.com</p>
        </div>

        <?php include 'includes/social_media.php'; ?>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>