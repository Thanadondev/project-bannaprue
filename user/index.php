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
    <title>แผงควบคุม</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>

    <?php include_once('nav.php'); ?>
    <div class="container mx-auto mt-10 p-5">
        <div class="bg-white rounded-lg shadow-xl p-6">
            <h1 class="text-3xl font-semibold text-gray-800">แผงควบคุม</h1>
            <p class="mt-2 text-lg text-gray-600">ยินดีต้อนรับ, <span class="font-medium text-gray-800"><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</p> <!-- Ensure to escape output for security -->
            <p class="mt-1 text-gray-600">นี่คือพื้นที่คุ้มครองที่คุณสามารถเข้าถึงได้หลังจากเข้าสู่ระบบ</p>

            <!-- Logout Button -->
            <div class="mt-5">
                <a href="logout.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2 -mt-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h8a1 1 0 110 2H5v10h7a1 1 0 110 2H4a1 1 0 01-1-1V4zm10.293 3.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L14.586 11H7a1 1 0 110-2h7.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </div>
</body>

</html>