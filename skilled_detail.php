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
    <title><?php echo htmlspecialchars($skilledItem['name']); ?> | ข้อมูลผู้เชี่ยวชาญ</title>
   <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <?php include_once('header.php'); ?>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-4xl font-semibold text-gray-800 mb-5"><?php echo htmlspecialchars($skilledItem['name']); ?></h2>
                    <img src="../Bannaprue//uploads/<?php echo htmlspecialchars($skilledItem['images']); ?>" alt="Image of <?php echo htmlspecialchars($skilledItem['name']); ?>" class="rounded-lg shadow-md mb-6"/>
                    <p class="text-gray-700 text-lg">
                        <?php echo nl2br(htmlspecialchars($skilledItem['description'])); ?>
                    </p>
                </div>
            </div>
            
            <!-- Call to action section -->
            <div class="flex justify-between items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <a href="index.php" class="flex items-center">
                    <span>View List</span>
                    <svg class="fill-current w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>

