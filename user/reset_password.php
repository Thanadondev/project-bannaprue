<?php
session_start();
require_once 'config/conn.php';

if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header('Location: index.php');
    exit();
}

// ตัวแปรสำหรับเก็บอีเมล
$email = '';

if (!empty($_SESSION['tel'])) {
    $tel = $_SESSION['tel'];

    // ดึงอีเมลจากฐานข้อมูล
    try {
        $stmt = $conn->prepare("SELECT email FROM users WHERE tel = ?");
        $stmt->execute([$tel]);
        $user = $stmt->fetch();

        if ($user) {
            $email = $user['email'];
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Failed to retrieve email: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['new_password'])) {
    $newPassword = $_POST['new_password'];

    try {
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE tel = ?");
        $stmt->execute([$newPasswordHash, $tel]);

        // Clear session and redirect to login
        session_destroy();
        header("Location: login.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Failed to reset password: " . $e->getMessage();
        header("Location: reset_password.php");
        exit();
    }
} else {
    // คำสั่ง HTML และ Tailwind CSS สำหรับฟอร์มเปลี่ยนรหัสผ่าน
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center">เปลี่ยนรหัสผ่านสำหรับ <?= htmlspecialchars($email) ?></div>
                <form action="reset_password.php" method="post">
                    <input type="password" name="new_password" required placeholder="New Password" class="w-full px-3 py-2 mb-4 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" />
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        เปลี่ยนรหัสผ่าน
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>
