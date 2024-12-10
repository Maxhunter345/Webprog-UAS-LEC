<?php
// includes/header.php
?>
<div id="loading-screen" class="loading-screen">
    <img src="assets/Logo SMA.png" alt="Loading" class="loading-logo">
</div>

<header class="included-header">
    <nav class="navbar">
        <div class="logo-container">
            <img src="assets/Logo SMA.png" alt="SMA Negeri 6 Tangerang">
            <h1 class="school-name">SMA NEGERI 6 TANGERANG</h1>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Home</a></li>
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
            <li><a href="admin_dashboard.php" class="btn-admin">Admin Dashboard</a></li>
        </ul>
    </nav>
</header>