<?php

session_start(); // เริ่มต้น session
session_unset();
// ทำลาย session
session_destroy();

// เปลี่ยนเส้นทางกลับไปยังหน้าล็อกอิน
header("Location: login.php");
exit();
?>
