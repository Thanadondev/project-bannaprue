<?php

session_start();
require_once 'config/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen justify-center">
    <?php include_once('header.php') ?>

    <div class="container max-w-md mx-auto my-36 bg-white p-8 rounded shadow-md">
        <h3 class="text-2xl font-semibold mb-4">สมัครสมาชิก</h3>
        <form action="register_db.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="mb-4">
                <label for="firstname" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" id="firstname" name="firstname" class="w-full px-3 py-2 border rounded-md" aria-describedby="firstname" required>
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" id="lastname" name="lastname" class="w-full px-3 py-2 border rounded-md" aria-describedby="lastname" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md" aria-describedby="email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="c_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="c_password" name="c_password" class="w-full px-3 py-2 border rounded-md" required>
            </div>
            <button type="submit" name="signup" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Sign Up</button>
        </form>
        <hr class="my-6">
        <p class="text-sm text-center text-gray-600">เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="login.php" class="text-blue-500">เข้าสู่ระบบ</a></p>
    </div>
    <?php include_once('footer.php') ?>

</body>

</html>