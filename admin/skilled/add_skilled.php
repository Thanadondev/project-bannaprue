<?php
session_start();
require_once 'config/conn.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $uploadPath = ''; // Initialize uploadPath

    // Handle the file upload
    if (!empty($_FILES['image']['name'])) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadDir = "../../uploads/";
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

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

    if (!empty($name) && !empty($description) && empty($_SESSION['error'])) {
        $stmt = $conn->prepare("INSERT INTO skilled (name, description, images) VALUES (:name, :description, :images)");
        $stmt->execute([':name' => $name, ':description' => $description, ':images' => $uploadPath]);
        $_SESSION['success'] = "skilled added successfully!";
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php'); // Redirect back if there are errors or fields are empty
        exit();
    }
}
?>
