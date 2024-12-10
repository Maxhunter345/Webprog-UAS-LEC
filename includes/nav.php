<?php
// includes/nav.php
?>
<nav class="navbar included-nav">
    <ul class="nav-links">
        <li class="dropdown">
            <a href="#">Profil ▼</a>
            <ul class="dropdown">
                <li><a href="visimisi.php">Visi dan Misi</a></li>
                <li><a href="sejarah.php">Sejarah</a></li>
            </ul>
        </li>
        <li><a href="guru.php">Guru</a></li>
        <li class="dropdown">
            <a href="#">Kesiswaan ▼</a>
            <ul class="dropdown">
                <li><a href="ekstrakurikuler.php">Ekstrakurikuler</a></li>
                <li><a href="prestasi.php">Prestasi</a></li>
            </ul>
        </li>
        <li><a href="ppdb.php">PPDB</a></li>
        <li><a href="kontak.php">Kontak</a></li>
        <?php if(isset($_SESSION['user_id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
            <li><a href="admin_dashboard.php" class="admin-link">Admin Panel</a></li>
        <?php endif; ?>
    </ul>
</nav>