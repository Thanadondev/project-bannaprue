<?php
session_start();
require_once 'config/conn.php';

header('Content-Type: application/json');


if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $newsId = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $uploadPath = '';

    if (!empty($_FILES['image']['name'])) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileName = $_FILES['image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = "../../uploads/";
            // สร้างชื่อไฟล์ใหม่เพื่อหลีกเลี่ยงการชนกันของชื่อไฟล์
            $newFileName = uniqid("IMG-", true) . "." . $fileExtension;
            $uploadPath = $uploadDir . $newFileName;

            // ย้ายไฟล์ไปยังโฟลเดอร์ uploads
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload image.']);
                exit();
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid file type.']);
            exit();
        }
    } else {
        // ถ้าไม่มีไฟล์ใหม่ถูกอัปโหลด, ใช้เส้นทางไฟล์เดิม
        $query = "SELECT images FROM news WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$newsId]);
        $uploadPath = $stmt->fetchColumn();
    }

    try {
        $query = "UPDATE news SET title = ?, description = ?, images = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $description, $uploadPath, $newsId]);

        $_SESSION['success'] = "News Updated successfully!";
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error updating news: ' . $e->getMessage()]);
    }
}
?>
