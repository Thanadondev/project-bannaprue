<?php

session_start();
require_once 'config/conn.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
    exit();
}

// Fetch news from the database
$skilledItems = $conn->query("SELECT * FROM skilled ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

try {
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT COUNT(*) FROM skilled");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้เชี่ยวชาญ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include_once('nav.php') ?>
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

        <hr class="my-4">
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
        <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded mb-3">
            เพิ่มผู้เชี่ยวชาญ
        </button>
        <hr class="my-4">
        <!-- News Add Modal -->
        <!-- Modal Background -->
        <div id="addskilledModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay, show modal on click -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <!-- Modal Panel -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">เพิ่ม ผู้เชี่ยวชาญ</h3>
                                <div class="mt-2">
                                    <!-- Form inside modal -->
                                    <form id="addskilledForm" method="post" enctype="multipart/form-data" action="add_skilled.php">
                                        <div class="mb-4">
                                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">ชื่อ:</label>
                                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">คำอธิบาย:</label>
                                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">รูปภาพ:</label>
                                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </div>
                                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm" onclick="submitAddskilledForm()" name="submit">เพิ่ม</button>
                                            <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()" name="cancel">ยกเลิก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit News Modal -->
        <div id="editskilledModal" class="fixed inset-0 z-10 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay, show modal on click -->
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

                <!-- Modal content -->
                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">แก้ไข ผู้เชี่ยวชาญ</h3>
                                <div class="mt-2">
                                    <!-- Form inside modal -->
                                    <form id="editskilledForm" method="post" action="edit_skilled.php" enctype="multipart/form-data">
                                        <!-- Dynamic content will be loaded here -->
                                        <div class="mt-2">
                                            <label for="name" class="block text-sm font-medium text-gray-700">ชื่อ:</label>
                                            <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-input" placeholder="News Title">
                                        </div>

                                        <div class="mt-2">
                                            <label for="description" class="block text-sm font-medium text-gray-700">คำอธิบาย:</label>
                                            <textarea id="description" name="description" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea" placeholder="News description..."></textarea>
                                        </div>

                                        <div class="mt-2">
                                            <label for="image" class="block text-sm font-medium text-gray-700">รูปภาพ:</label>
                                            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                บันทึก
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- TABLE  -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ชื่อ</th>
                        <th class="py-3 px-6 text-left">คำอธิบาย</th>
                        <th class="py-3 px-6 text-center">รูปภาพ</th>
                        <th class="py-3 px-6 text-center">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php foreach ($skilledItems as $item) { ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap"><?php echo htmlspecialchars($item['name']); ?></td>
                            <td class="py-3 px-6 text-left"><?php echo htmlspecialchars(substr($item['description'], 0, 50)) . '...'; ?></td>
                            <td class="py-3 px-6 text-center">
                                <?php
                                // Assuming images are stored as JSON or comma-separated values
                                // This example will need adjusting based on how images are stored and intended to be displayed
                                $images = explode(',', $item['images']); // Adjust as necessary
                                foreach ($images as $image) {
                                    echo "<img src='$image' alt='image' class='w-10 h-10 inline-block'>"; // Adjust path as necessary
                                }
                                ?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <!-- Button to open the modal -->
                                <button onclick="openEditModal(<?php echo $item['id']; ?>)" class="py-1 px-3 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition duration-300 ease-in-out">แก้ไข</button>
                                <a href="delete_skilled.php?id=<?php echo $item['id']; ?>" class="py-1 px-3 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300 ease-in-out">ลบ</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('addskilledModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('addskilledModal').style.display = 'none';
        }


        function submitAddskilledForm() {
            document.forms['addskilledForm'].submit();
        }

        function openEditModal(skilledId) {
            fetch(`get_skilled_data.php?id=${skilledId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok.');
                    return response.json();
                })
                .then(data => {

                    const form = document.getElementById('editskilledForm');
                    form.innerHTML = `
            <input type="hidden" name="id" value="${data.id}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">ชื่อ:</label>
                <input type="text" name="name" value="${data.name}" id="name" required class="shadow border rounded w-full">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">คำอธิบาย:</label>
                <textarea name="description" id="description" required class="shadow border rounded w-full" rows="4">${data.description}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Current รูปภาพ:</label>
                <img src="../../uploads/${data.image}" alt="Image" class="w-20 h-20 mb-2">
                <input type="file" name="image" id="image" class="shadow border rounded w-full">
            </div>
            <div class="flex justify-end">
                <button type="submit" name="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm">Save Changes</button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModalE()" name="cancel">Cancel</button>
                </div>
        `;
                    // Open modal
                    document.getElementById('editskilledModal').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while fetching news data.');
                });
        }

        function closeModalE() {
            document.getElementById('editskilledModal').style.display = 'none';
        }
    </script>
</body>

</html>