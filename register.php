<?php
session_start();
require_once 'db_config.php';

$error = '';
$success = '';

// Define valid admin registration codes - in production, these should be stored securely in database
const ADMIN_CODES = ['ADMIN123', 'SECUREADMIN456']; // Example codes - change these in production

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $recovery_question_1 = htmlspecialchars($_POST['recovery_question_1']);
    $recovery_answer_1 = htmlspecialchars($_POST['recovery_answer_1']);
    $recovery_question_2 = htmlspecialchars($_POST['recovery_question_2']);
    $recovery_answer_2 = htmlspecialchars($_POST['recovery_answer_2']);
    
    // Get admin code if provided
    $admin_code = isset($_POST['admin_code']) ? trim($_POST['admin_code']) : '';
    $is_admin = !empty($admin_code) && in_array($admin_code, ADMIN_CODES);

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        $error = "Email sudah terdaftar.";
    } elseif ($password !== $confirm_password) {
        $error = "Password tidak cocok.";
    } elseif (!empty($admin_code) && !in_array($admin_code, ADMIN_CODES)) {
        $error = "Kode admin tidak valid.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_answer_1 = password_hash($recovery_answer_1, PASSWORD_DEFAULT);
        $hashed_answer_2 = password_hash($recovery_answer_2, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (email, password, recovery_question_1, recovery_answer_1, recovery_question_2, recovery_answer_2, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$email, $hashed_password, $recovery_question_1, $hashed_answer_1, $recovery_question_2, $hashed_answer_2, $is_admin])) {
            $success = "Registrasi Berhasil! Silahkan login.";
            header("refresh:2;url=login.php");
        } else {
            $error = "Registrasi gagal. Silahkan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - SMA Negeri 6 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <img src="assets/Logo SMA.png" alt="Logo SMA" class="auth-logo">
            <h2>Register</h2>
            <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="success-message"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="post" class="auth-form">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
                </div>
                
                <!-- Admin Code Field (Optional) -->
                <div class="form-group">
                    <input type="text" name="admin_code" placeholder="Kode Admin (opsional)">
                </div>
                
                <div class="form-group">
                    <select name="recovery_question_1" required>
                        <option value="">Pilih Pertanyaan Pemulihan 1</option>
                        <option value="Siapa nama gadis ibu Anda?">Siapa nama gadis ibu Anda?</option>
                        <option value="Apa nama hewan peliharaan pertama Anda?">Apa nama hewan peliharaan pertama Anda?</option>
                        <option value="Apa nama sekolah dasar Anda?">Apa nama sekolah dasar Anda?</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="recovery_answer_1" placeholder="Jawaban Pertanyaan 1" required>
                </div>
                
                <div class="form-group">
                    <select name="recovery_question_2" required>
                        <option value="">Pilih Pertanyaan Pemulihan 2</option>
                        <option value="Apa warna favorit Anda?">Apa warna favorit Anda?</option>
                        <option value="Apa makanan favorit Anda?">Apa makanan favorit Anda?</option>
                        <option value="Di kota mana Anda lahir?">Di kota mana Anda lahir?</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="recovery_answer_2" placeholder="Jawaban Pertanyaan 2" required>
                </div>

                <button type="submit" name="register" class="auth-btn">Register</button>
            </form>
            <p class="auth-links">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </p>
            <a href="auth.php" class="back-link">Kembali</a>
        </div>
    </div>
</body>
</html>