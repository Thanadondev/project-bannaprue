<?php
session_start();
require_once 'config/conn.php';

// รับค่าจากฟอร์ม
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// ตรวจสอบความถูกต้องของข้อมูล
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    // ตั้งค่าข้อความ error และ redirect กลับไปหน้า contact
    $_SESSION['error'] = "All fields are required.";
    header("Location: contact.php");
    exit();
}

// สร้างข้อความอีเมล
$emailBody = "Name: $name\n";
$emailBody .= "Email: $email\n";
$emailBody .= "Subject: $subject\n";
$emailBody .= "Message: $message";

// ส่งอีเมล
$to = "Thanadon.hcyp@gmail.com";
$headers = "From: $email";

if (mail($to, $subject, $emailBody, $headers)) {
    // ตั้งค่าข้อความ success และ redirect กลับไปหน้า contact หรือไปหน้าขอบคุณ
    $_SESSION['success'] = "Your message has been sent successfully.";
    header("Location: contact.php");
} else {
    // จัดการกับ error ในกรณีที่การส่งอีเมลไม่สำเร็จ
    $_SESSION['error'] = "Failed to send your message.";
    header("Location: contact.php");
    exit();
}
?>
