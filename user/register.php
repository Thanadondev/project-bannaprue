<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
</head>

<body class="font-sans bg-gray-100 ">
    <?php include('header.php') ?>
    <div class="font-sans container mx-auto px-6 my-32">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="font-sans bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="font-sans bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <div class="font-sans max-w-md mx-auto bg-white rounded-xl overflow-hidden px-6 py-1.5 shadow-lg md:max-w-lg">
            <div class="font-sans md:flex">
                <div class="font-sans w-full p-6 px-6 py-10">
                    <div class="font-sans text-center">
                        <h2 class="font-sans text-2xl text-gray-900">สมัครสมาชิก</h2>
                    </div>
                    <hr class="font-sans my-4">

                    <form class="font-sans mt-6" action="signup_process.php" method="POST">
                        <div class="font-sans mb-4">
                            <input type="email" name="email" id="email" placeholder="Email" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-6">
                            <input type="password" name="password" id="password" placeholder="Password" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-4">
                            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-4">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-4">
                            <input type="text" name="address" id="address" placeholder="Address" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-4">
                            <input type="text" name="tel" id="tel" placeholder="Telphone" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="font-sans mb-4">
                            <input type="text" name="lineid" id="lineid" placeholder="ID LINE" class="font-sans w-full px-4 py-3 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <button type="submit" class="font-sans w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold focus:ring-4 focus:ring-blue-500 focus:outline-none">ยืนยัน</button>
                        </div>
                    </form>
                    <p class="font-sans mt-6 text-center text-gray-600">มีบัญชีอยู่แล้ว <a href="login.php" class="font-sans text-blue-600 hover:underline">ไปยังหน้าเข้าสู่ระบบ</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>