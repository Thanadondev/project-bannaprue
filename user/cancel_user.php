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
    <title>ยกเลิกการเป็นสมาชิก</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">
    <?php include_once('nav.php'); ?>

    <div class="container mx-auto px-4 py-12">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <div class="max-w-md mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-center text-2xl font-semibold text-gray-800">ยกเลิกการเป็นสมาชิก</h2>
                <p class="mt-1 text-center text-gray-600">กรุณากรอกอีเมลหรือหมายเลขโทรศัพท์ของคุณเพื่อยืนยันการยกเลิก</p>
                <form action="cancel_user_db.php" method="post" class="mt-4">
                    <div class="mb-4">
                        <input type="text" id="email_or_phone" name="email_or_phone" placeholder="Email or Phone" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        ยืนยันการยกเลิก
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>