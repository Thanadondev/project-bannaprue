<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body class="bg-gray-100">
    <?php include('header.php') ?>
    <div class="container mx-auto px-4 my-44">
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
        <div class="max-w-md mx-auto bg-white rounded-xl overflow-hidden shadow-lg ">
            <div class="md:flex">
                <div class="w-full p-2 px-10 py-14">
                    <div class="text-center">
                        <h2 class="text-2xl font-sans text-gray-900">หน้าเข้าสู่ระบบ</h2>
                    </div>
                    <hr class="my-4">

                    <form class="mt-6" action="login_process.php" method="POST">
                        <div class="mb-4">
                            <input type="email" name="email" id="email" placeholder="Email" class="w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-6">
                            <input type="password" name="password" id="password" placeholder="Password" class="w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <button type="submit" name="signin" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold focus:ring-4 focus:ring-blue-500 focus:outline-none">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                    <p class="mt-6 text-center text-gray-600"> <a href="forget_password.php" class="text-blue-600 hover:underline">ลืมรหัสผ่าน</a> </p>
                    <hr class="my-4">

                    <p class="mt-6 text-center text-gray-600">คุณเป็นสมาชิกแล้วหรือยัง ?<a href="register.php" class="text-blue-600 hover:underline"> กดเพื่อสมัครเป็นสมาชิก</a></p>
                    
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>

</body>

</html>