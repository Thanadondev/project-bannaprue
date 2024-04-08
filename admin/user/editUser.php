<?php
session_start();
require_once 'config/conn.php';
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $lineid = $_POST['lineid'];

    try {
        $stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, address = ?, tel = ?, lineid = ? WHERE id = ?");
        $stmt->execute([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['address'], $_POST['tel'], $_POST['lineid'], $id]);

        echo json_encode(['success' => true, 'message' => 'User updated successfully']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error updating user: ' . $e->getMessage()]);
    }
}
?>
