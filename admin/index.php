<?php
session_start();
require_once 'config/conn.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
    exit();
}

try {
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT COUNT(*) FROM news");
    $stmt->execute();

    // Fetch the count
    $totalNews = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Handle any errors
    $totalNews = "Error: " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM activities ORDER BY created_at DESC LIMIT 5"; // Fetch the 5 most recent activities
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users");
    $stmt->execute();

    // Fetch the count
    $totalUsers = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Handle any errors
    $totalUsers = "Error: " . $e->getMessage();
}

try {
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT COUNT(*) FROM skilled");
    $stmt->execute();

    // Fetch the count
    $totalskilled = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Handle any errors
    $totalskilled = "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ดผู้ดูแลระบบ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <?php include_once('nav.php') ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold">ยินดีต้อนรับสู่แดชบอร์ดผู้ดูแลระบบ</h1>
        <div class="py-8">
            <!-- Quick Stats -->
            <div class="grid md:grid-cols-3 gap-4">
                <!-- Total News -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-semibold text-lg">ข่าวทั้งหมด</h4>
                    <p class="text-xl"><?php echo htmlspecialchars($totalNews); ?></p>
                </div>
                <!-- Active Users -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-semibold text-lg">สมาชิกทั้งหมด</h4>
                    <p class="text-xl"><?php echo htmlspecialchars($totalUsers); ?></p>
                </div>
                <!-- Active skilled -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-semibold text-lg">ผู้เชี่ยวชาญทั้งหมด</h4>
                    <p class="text-xl"><?php echo htmlspecialchars($totalskilled); ?></p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8">
                <h3 class="text-2xl font-semibold mb-4">การดำเนินการด่วน</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="../admin/news/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">จัดการข่าว</a>
                    <a href="../admin/user/" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">จัดการสมาชิก</a>
                    <a href="../admin/skilled/" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded text-center">จัดการผู้เชี่ยวชาญ</a>
                    <!-- Additional quick actions -->
                </div>
            </div>
        </div>

    </div>
</body>

</html>