<?php
session_start();
require_once 'config/conn.php';

try {
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $users = [];
    $_SESSION['error'] = "Error fetching users: " . $e->getMessage();
}

$newsItems = $conn->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <?php include_once('nav.php'); ?>
    <div class="container mx-auto px-4 mt-3">
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
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold text-lg">ผู้เชี่ยวชาญทั้งหมด</h4>
                <p class="text-xl"><?php echo htmlspecialchars($totalskilled); ?></p>
            </div>
        </div>
        <div class="container mx-auto px-4 py-8">
            <hr class="my-4">

            <div class="mb-4 flex justify-between items-center">
                <h1 class="text-2xl font-semibold">การจัดการสมาชิก</h1>
                <button onclick="showModal('addUserModal')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add User
                </button>
            </div>
            <hr class="my-4">
            <!-- Error or Success Messages -->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?= $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <!-- Users Table -->
            <div class="overflow-x-auto mt-6 shadow-md rounded-lg">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">ชื่อ</th>
                            <th class="py-3 px-6 text-left">นามสกุล</th>
                            <th class="py-3 px-6 text-center">อีเมลล์</th>
                            <th class="py-3 px-6 text-center">รหัสผ่าน</th>
                            <th class="py-3 px-6 text-left">ที่อยู่</th>
                            <th class="py-3 px-6 text-left">เบอร์โทร</th>
                            <th class="py-3 px-6 text-left">ไอดี ไลน์</th>
                            <th class="py-3 px-6 text-center">เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php foreach ($users as $user) : ?>
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['firstname']); ?></td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['lastname']); ?></td>
                                <td class="py-3 px-6 text-center"><?= htmlspecialchars($user['email']); ?></td>
                                <td class="py-3 px-6 text-center">••••••••</td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['address']); ?></td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['tel']); ?></td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['lineid']); ?></td>
                                <td class="py-3 px-6 text-center">
                                    <button onclick="showEditUserModal(<?= $user['id']; ?>)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-xs">แก้ไข</button>
                                    <button onclick="confirmDeleteUser(<?= $user['id']; ?>)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">ลบ</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add User Modal -->
        <div id="addUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-xl m-4 max-w-md w-full">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">เพิ่มสมาชิก</h3>
                            <button onclick="hideModal('addUserModal')" class="text-gray-600 hover:text-gray-800">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <form id="userForm" class="space-y-4">
                            <input type="hidden" name="id" id="userId">
                            <div>
                                <input type="text" id="firstname" name="firstname" placeholder="First Name" class="input input-bordered w-full" required />
                            </div>
                            <div>
                                <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="input input-bordered w-full" required />
                            </div>
                            <div>
                                <input type="email" id="email" name="email" placeholder="Email" class="input input-bordered w-full" required />
                            </div>
                            <div>
                                <input type="text" id="address" name="address" placeholder="Address" class="input input-bordered w-full" />
                            </div>
                            <div>
                                <input type="tel" id="tel" name="tel" placeholder="Telephone" class="input input-bordered w-full" />
                            </div>
                            <div>
                                <input type="text" id="lineid" name="lineid" placeholder="Line ID" class="input input-bordered w-full" />
                            </div>
                            <div>
                                <input type="password" id="password" name="password" placeholder="Password" class="input input-bordered w-full" required />
                            </div>
                            <div class="flex justify-end space-x-2 mt-4">
                                <button type="button" onclick="hideModal('addUserModal')" class="btn border border-gray-300 text-gray-800 hover:bg-gray-50">ยกเลิก</button>
                                <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>