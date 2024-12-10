<?php
// admin/manage_ppdb.php
session_start();
require_once '../db_config.php';

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $academic_year = filter_input(INPUT_POST, 'academic_year', FILTER_SANITIZE_STRING);
    $start_date = filter_input(INPUT_POST, 'start_date', FILTER_SANITIZE_STRING);
    $end_date = filter_input(INPUT_POST, 'end_date', FILTER_SANITIZE_STRING);

    $stmt = $pdo->prepare("INSERT INTO ppdb_info (title, content, academic_year, start_date, end_date) 
                          VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $content, $academic_year, $start_date, $end_date]);
    
    header('Location: manage_ppdb.php?success=1');
    exit();
}
?>