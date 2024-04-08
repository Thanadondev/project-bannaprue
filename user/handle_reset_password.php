
<?php
session_start();
require_once 'config/conn.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS as VonageSMS; // เพิ่มบรรทัดนี้


$apiKey = '929a237d';
$apiSecret = 'wLPka6mlhQaUTNkq';

$client = new Client(new Basic($apiKey, $apiSecret));

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['tel'])) {
    $tel = $_POST['tel'];
    $tel = preg_replace('/\D/', '', $tel);
    if(substr($tel, 0, 1) === '0') {
        $tel = '+66' . substr($tel, 1);
    }

    $otp = rand(100000, 999999);
    $expire_time = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    try {
        $stmt = $conn->prepare("INSERT INTO otp_table (tel, otp, expire_time) VALUES (?, ?, ?)");
        $stmt->execute([$tel, $otp, $expire_time]);

        // สร้าง SMS message โดยใช้คลาส Vonage\SMS\Message\SMS
        $message = new VonageSMS($tel, 'Bannaprue member ', "Your OTP is: {$otp}. It will expire in 5 minutes.");
        $response = $client->sms()->send($message);

        $_SESSION['tel'] = $tel; // สำหรับใช้ในการยืนยัน OTP
        header("Location: verify_otp.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Error sending OTP: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
?>
