<?php

session_start();
require_once 'config/conn.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_phone = $_POST['email_or_phone'];

    // ตรวจสอบว่า email หรือเบอร์โทรศัพท์นี้มีอยู่จริงในฐานข้อมูลหรือไม่
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email_or_phone OR tel = :email_or_phone");
        $stmt->execute(['email_or_phone' => $email_or_phone]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // ยกเลิกการเป็นสมาชิก
            $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute(['id' => $user['id']]);

            $_SESSION['success'] = "Your membership has been successfully cancelled.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "No account found with that email or phone number.";
            header("Location: cancel_user.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: cancel_user.php");
        exit();
    }
} else {
    header("Location: cancel_user.php");
    exit();
}

?>
