<?php
// เริ่ม session
session_start();

// เชื่อมต่อฐานข้อมูล
require_once 'config/conn.php';

// ตรวจสอบว่ามี ID ข่าวที่ส่งมาหรือไม่
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $skilledId = $_GET['id'];

    // เตรียมและดำเนินการ query ดึงข้อมูลข่าว
    $stmt = $conn->prepare("SELECT * FROM skilled WHERE id = ?");
    $stmt->execute([$skilledId]);
    $skilledItem = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$skilledItem) {
        echo "ข่าวไม่พบหรือถูกลบไปแล้ว";
        exit;
    }
} else {
    echo "ID ข่าวไม่ถูกต้อง";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($skilledItem['name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-inter">
    <?php include_once('header.php'); ?>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden max-w-3xl mx-auto">
            <img src="../Bannaprue//uploads<?php echo htmlspecialchars($skilledItem['images']); ?>" alt="skilled Image" class="w-full h-auto">
            <div class="p-8">
                <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($skilledItem['name']); ?></h1>
                <p class="text-gray-600 mb-4"><?php echo nl2br(htmlspecialchars($skilledItem['description'])); ?></p>
                <a href="index.php" class="btn btn-primary">Back to skilled List</a>
            </div>
        </div>
    </div>
</body>
<?php
   include_once('footer.php')
   ?>
</html>
