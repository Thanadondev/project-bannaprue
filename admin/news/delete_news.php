<?php
session_start();
require_once 'config/conn.php';

if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: ../login.php');
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php'); // Adjust redirect as needed
    exit();
}

// Delete the news item from the database
$stmt = $conn->prepare("DELETE FROM news WHERE id = :id");
$stmt->execute([':id' => $id]);

$_SESSION['success'] = "News deleted successfully!";
header('Location: index.php'); // Adjust redirect as needed
exit();
?>
