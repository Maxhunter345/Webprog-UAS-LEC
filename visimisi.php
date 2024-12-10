<?php
// visimisi.php
session_start();
require_once 'db_config.php';

// Fetch vision and mission from database
$stmt = $pdo->prepare("SELECT * FROM school_profile WHERE category IN ('vision', 'mission')");
$stmt->execute();
$profile_data = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

$vision = $profile_data['vision'] ?? '';
$mission = $profile_data['mission'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visi dan Misi - SMA Negeri 6 Tangerang</title>
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

    <section class="visi-misi-container">
        <h1>Visi dan Misi</h1>

        <div class="main-card">
            <div class="content-card-visi">
                <div class="card-title-visi">
                    Visi
                </div>
                <div class="divider"></div>
                <div class="card-content">
                    <?php echo nl2br(htmlspecialchars($vision)); ?>
                </div>
            </div>

            <div class="content-card-misi">
                <div class="card-title-misi">
                    Misi
                </div>
                <div class="divider"></div>
                <div class="card-content">
                    <?php echo nl2br(htmlspecialchars($mission)); ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>