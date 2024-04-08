<?php
session_start();
require_once 'config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';

    if (empty($token) || empty($newPassword)) {
        // ข้อมูลไม่ครบถ้วน
        echo "Required fields are missing.";
        exit;
    }

    // ตรวจสอบ token ในฐานข้อมูล
    $stmt = $conn->prepare("SELECT user_id FROM reset_passwords WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Token ถูกต้อง, อัปเดตรหัสผ่าน
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$newPasswordHash, $user['user_id']]);

        // ล้าง token
        $stmt = $conn->prepare("DELETE FROM reset_passwords WHERE token = ?");
        $stmt->execute([$token]);

        echo "Your password has been updated successfully.";
    } else {
        echo "Invalid token.";
    }
} else {
    echo "Invalid request.";
}
?>
