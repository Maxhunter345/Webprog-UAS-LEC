<?php
session_start();
require_once 'db_config.php';

// Handle contact form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $message) {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
        $success_message = "Pesan Anda telah terkirim. Terima kasih telah menghubungi kami.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMA Negeri 6 Tangerang</title>
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

    <!-- Contact Section -->
    <section class="contact-maps-section">
        <h2 class="contact-title">Kontak dan Alamat SMA Negeri 6 Tangerang</h2>
        
        <?php if (isset($success_message)): ?>
            <div class="success-message"><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>

        <!-- Contact Form -->
        <form method="POST" class="contact-form">
            <div class="form-group">
                <input type="text" name="name" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" name="subject" placeholder="Subjek">
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Pesan" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Kirim Pesan</button>
        </form>

        <!-- Map Container -->
        <div class="contact-map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.313120572602!2d106.62419651469712!3d-6.1746997610913725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42a28ad70f5205%3A0x1180d2d56abfe545!2sSMA%20Negeri%206%20Tangerang!5e0!3m2!1sen!2sid!4v1687765227573!5m2!1sen!2sid" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <!-- Contact Information -->
        <div class="contact-info">
            <p><strong>Alamat:</strong> Jln. Nyimas Melati No. 2 Karanganyar Neglasari Kota Tangerang 15121</p>
            <p><strong>No. Telpon:</strong> (021) 5587229</p>
            <p><strong>Email:</strong> sman6tangerangkota@gmail.com</p>
        </div>

        <!-- Contact Cards -->
        <div class="contact-card-container">
            <div class="contact-card">
                <div class="contact-card-content">
                    <img src="assets/Logo SMA.png" alt="Logo Sekolah" class="contact-logo">
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-card-content">
                    <p class="contact-card-title">Social Media</p>
                    <ul class="contact-social-links">
                        <li><a href="https://www.instagram.com/sman6tng/" target="_blank">@sman6tng</a></li>
                        <li><a href="https://www.instagram.com/perpus_wd/" target="_blank">@perpus_wd</a></li>
                        <li><a href="https://www.youtube.com/c/sman6tangerang" target="_blank">sman6tangerang</a></li>
                        <li><a href="https://twitter.com/sman6tng" target="_blank">@sman6tng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>