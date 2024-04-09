<?php
session_start();
require_once 'config/conn.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $uploadPath = ''; // Initialize uploadPath

    function lineNotifyMessage($token, $message, $imagePath = null)
    {
        $queryData = ['message' => $message];

        if ($imagePath) {
            $queryData['imageThumbnail'] = $imagePath;
            $queryData['imageFullsize'] = $imagePath;
        }

        $queryData = http_build_query($queryData, '', '&');

        $headerOptions = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . $token . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ],
        ];
        $context = stream_context_create($headerOptions);
        $result = file_get_contents("https://notify-api.line.me/api/notify", FALSE, $context);
        $res = json_decode($result);
        return $res;
    }

    // Handle the file upload
    if (!empty($_FILES['image']['name'])) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadDir = "../../uploads/";
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $publicAccessibleUrl = "http://localhost/bannaprue/uploads/" . basename($fileName);
        // Validate the file extension
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadPath = $uploadDir . basename($fileName);
            // Move the file to your upload directory
            if (!move_uploaded_file($fileTmpName, $uploadPath)) {
                // Error moving file
                $_SESSION['error'] = 'Error uploading the file!';
                $uploadPath = ''; // Reset upload path if failed
            }
        } else {
            // Invalid file extension
            $_SESSION['error'] = 'Invalid file extension!';
        }
    }

    if (!empty($title) && !empty($description) && empty($_SESSION['error'])) {
        $stmt = $conn->prepare("INSERT INTO news (title, description, images) VALUES (:title, :description, :images)");
        $stmt->execute([':title' => $title, ':description' => $description, ':images' => $uploadPath]);

        $message = "มีข่าวใหม่เพิ่มเข้ามา:\nหัวข้อข่าว: $title\n เพิ่มเติม$description\nเข้าสู่เว็บไซต์:<a href='http://localhost/bannaprue/'>\nดูรายละเอียด: $uploadPath";
        $lineToken = 'GP221CRjNQr0RBlqJwpe6SV8jXm2AkdaRjJGrcEqjYl'; // ตรวจสอบให้แน่ใจว่าใช้ Token ที่ถูกต้อง
        $testimages = "https://cdn.discordapp.com/attachments/1027523778206502972/1227132343949463582/original-1612432687484.png?ex=66274b0d&is=6614d60d&hm=e84d8d492382988264be6943e6c4f1d8fc358b197cc42c07137498302215c8a3&";
        // เรียกใช้งานฟังก์ชัน lineNotifyMessage และส่ง path ของรูปภาพ
        $response = lineNotifyMessage($lineToken, $message, $testimages); // ตรวจสอบให้แน่ใจว่า $uploadPath สามารถเข้าถึงได้จากอินเทอร์เน็ต

        if ($response->status == 200) {
            $_SESSION['success'] = "News added successfully and notification sent!";
        } else {
            $_SESSION['error'] = "News added but failed to send notification.";
        }
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php'); // Redirect back if there are errors or fields are empty
        exit();
    }
}
