<?php
// Example code for get_news_data.php
session_start();
require_once 'config/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM skilled WHERE id = ?");
    $stmt->execute([$id]);
    $newsItem = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($newsItem);
}

?>