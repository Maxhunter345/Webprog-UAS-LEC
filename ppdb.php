<?php
// ppdb.php
session_start();
require_once 'db_config.php';

// Fetch PPDB information
$stmt = $pdo->prepare("SELECT * FROM ppdb_info WHERE academic_year = ? ORDER BY created_at DESC LIMIT 1");
$current_year = date('Y');
$stmt->execute([$current_year]);
$ppdb_info = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PPDB - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section class="hero">
        <div class="hero-content">
            <div class="hero-image">
                <img src="assets/Logo SMA.png" alt="Hero Image">
            </div>
            <h1>SMA NEGERI 6 TANGERANG</h1>
        </div>
    </section>

    <?php if ($ppdb_info): ?>
    <section class="ppdb-info">
        <h2><?php echo htmlspecialchars($ppdb_info['title']); ?></h2>
        <div class="ppdb-content">
            <?php echo nl2br(htmlspecialchars($ppdb_info['content'])); ?>
            
            <div class="ppdb-dates">
                <p><strong>Periode Pendaftaran:</strong></p>
                <p>Mulai: <?php echo date('d F Y', strtotime($ppdb_info['start_date'])); ?></p>
                <p>Sampai: <?php echo date('d F Y', strtotime($ppdb_info['end_date'])); ?></p>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="features" id="fitur">
        <div class="feature-cards">
            <div class="feature-card">
                <img src="assets/prestasi.svg" alt="Prestasi">
                <h3>Prestasi</h3>
            </div>
            <div class="feature-card">
                <img src="assets/ekstrakurikuler.svg" alt="Ekstrakurikuler">
                <h3>Ekstrakurikuler</h3>
            </div>
            <div class="feature-card">
                <img src="assets/elearning.svg" alt="E-Learning">
                <h3>E-Learning</h3>
            </div>
            <div class="feature-card">
                <img src="assets/enews.svg" alt="E-News">
                <h3>E-News</h3>
            </div>
            <div class="feature-card">
                <img src="assets/elibrary.svg" alt="E-Library">
                <h3>E-Library</h3>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
