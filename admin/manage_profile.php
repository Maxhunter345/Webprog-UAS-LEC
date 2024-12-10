<?php
// admin/manage_profile.php
session_start();
require_once '../db_config.php';

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vision = filter_input(INPUT_POST, 'vision', FILTER_SANITIZE_STRING);
    $mission = filter_input(INPUT_POST, 'mission', FILTER_SANITIZE_STRING);

    // Update vision
    $stmt = $pdo->prepare("UPDATE school_profile SET content = ? WHERE category = 'vision'");
    $stmt->execute([$vision]);

    // Update mission
    $stmt = $pdo->prepare("UPDATE school_profile SET content = ? WHERE category = 'mission'");
    $stmt->execute([$mission]);

    header('Location: manage_profile.php?success=1');
    exit();
}
?>