<?php session_start(); ?>

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
<?php include('header.php') ?>

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
                <h2 class="text-center text-2xl font-semibold text-gray-800">ลืมรหัสผ่าน ?</h2>
                <p class="mt-1 text-center text-gray-600">กรุณากรอกหมายเลขโทรศัพท์ของคุณเพื่อรีเซ็ตรหัสผ่านของคุณ</p>
                <form action="handle_reset_password.php" method="post" class="mt-4">
                    <div class="mb-4">
                        <input type="tel" name="tel" placeholder="Phone Number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow">
                            ยืนยัน
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>