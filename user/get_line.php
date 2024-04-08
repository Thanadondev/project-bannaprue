<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่าผู้ใช้ได้ล็อกอินแล้วหรือไม่
if (!isset($_SESSION['user'])) {
    // หากไม่มีการตั้งค่า session สำหรับ user_id หมายความว่าผู้ใช้ยังไม่ได้ล็อกอิน
    header('Location: login.php'); // เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าร่วมกลุ่มไลน์ของเรา</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once('nav.php'); ?>

    <div class="container mx-auto mt-10 p-5">
        <div class="bg-white rounded-lg shadow-xl p-6 text-center">
            <h1 class="text-3xl font-semibold text-gray-800">เข้าร่วมกลุ่มไลน์ของเรา!</h1>
            <p class="mt-2 text-lg text-gray-600">สแกน QR Code ด้านล่างเพื่อเข้าร่วมกลุ่ม Line ของเราและติดตามข่าวสารล่าสุด</p>

            <!-- Display QR Code -->
            <div class="mt-5">
                <img src="../images/qr.jpg" alt="Line Group QR Code" class="mx-auto">
            </div>

            <!-- Optional: Add some instructions or description -->
            <div class="mt-5 text-gray-600">
                <p>สแกน QR Code นี้ด้วยแอป Line เพื่อเข้าร่วมกลุ่มของเราได้ทันที</p>
            </div>
        </div>
    </div>
</body>
</html>
