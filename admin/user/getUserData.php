<?php
require_once 'config/conn.php';
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($user);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Error fetching user: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "No user ID provided"]);
}
?>
