<?php
session_start();
require_once 'config/conn.php'; // Ensure this path is correct.
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data.
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $password = $_POST['password'] ?? '';
    $lineid = $_POST['lineid'] ?? '';

    // Simple validation (for demonstration purposes only, consider more robust validation).
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
        // Missing data, handle error here.
        $_SESSION['error'] = "Required fields are missing.";
        header('Location: index.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email format is incorrect
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit();
    }

    // Password encryption (consider using password_hash in your project).
    $hashedPassword = md5($password); // Example using md5, NOT recommended for production.

    try {
        // Assuming you have already prepared the $conn object
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, address, tel, password, lineid) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Always hash passwords
        $stmt->execute([$firstname, $lastname, $email, $address, $tel, $passwordHash, $lineid]);

        echo json_encode(['success' => true, 'message' => 'User added successfully']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Not a POST request, redirect back to the form or handle accordingly.
    header('Location: index.php');
}
