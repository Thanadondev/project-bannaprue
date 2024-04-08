<?php
session_start();
require_once './config/conn.php'; // ตรวจสอบว่าไฟล์นี้มีรายละเอียดการเชื่อมต่อฐานข้อมูลถูกต้อง

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $email = test_input($_POST["email"]);
    $userPassword = test_input($_POST["password"]);
    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $address = test_input($_POST["address"]);
    $tel = test_input($_POST["tel"]);
    $lineid = test_input($_POST["lineid"]);

    // Validate input data
    if (empty($email) || empty($userPassword) || empty($firstname) || empty($lastname) || empty($address) || empty($tel) || empty($lineid)) {
        $_SESSION['error'] = 'All fields are required.';
        header("Location: register.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: register.php");
    }

    // Hash the password for storing safely in the database
    $hashed_password = password_hash($userPassword, PASSWORD_DEFAULT);

    // Insert the data into the database
    try {
        $sql = "INSERT INTO users (email, password, firstname, lastname, address, tel, lineid) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $hashed_password, $firstname, $lastname, $address, $tel, $lineid]);

        $_SESSION['success'] = 'Registration successful. You can now login.';
        header("Location: login.php");
    } catch(PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: register.php");
    }

    $conn = null;
} else {
    // Redirect to register page if accessed directly without POST method
    header("Location: register.php");
}
?>
