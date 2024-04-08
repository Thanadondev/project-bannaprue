<?php
session_start();
require_once 'config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['otp'])) {
    $otp = $_POST['otp'];
    $tel = $_SESSION['tel'];

    try {
        $stmt = $conn->prepare("SELECT * FROM otp_table WHERE tel = ? AND otp = ? AND expire_time > NOW()");
        $stmt->execute([$tel, $otp]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['otp_verified'] = true;
            header("Location: reset_password.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid or expired OTP.";
            header("Location: verify_otp.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Verification failed: " . $e->getMessage();
        header("Location: verify_otp.php");
        exit();
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100">
<?php include('header.php') ?>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell" /></i>
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Error!</b> <?= $_SESSION['error']; ?>
                        <?php unset($_SESSION['error']); ?>
                    </span>
                </div>
            <?php endif; ?>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-center">Verify OTP</div>
                <p class="text-gray-700 text-base mb-4">
                    Please enter the OTP sent to your phone.
                </p>
                <form action="verify_otp.php" method="post">
                    <input type="text" name="otp" placeholder="Enter OTP" required class="w-full px-3 py-2 mb-4 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" />
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Verify
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>
