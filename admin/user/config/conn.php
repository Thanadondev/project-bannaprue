<?php
date_default_timezone_set('Asia/Bangkok');

// กำหนดค่าสำหรับการเชื่อมต่อกับ MySQL Database
$servername = "localhost"; // เชื่อมต่อกับเซิร์ฟเวอร์ localhost
$username = "root"; // ชื่อผู้ใช้ของ MySQL
$password = ""; // รหัสผ่านของ MySQL
$database = "bannaprue_db"; // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ

try {
    // สร้างการเชื่อมต่อ PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // กำหนดโหมดการแสดงผลผลลัพธ์เป็น Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // การเชื่อมต่อถูกสร้างขึ้นสำเร็จ
    // ไม่จำเป็นต้องใส่ข้อความตรวจสอบการเชื่อมต่อไว้ที่นี่
} catch(PDOException $e) {
    // การเชื่อมต่อไม่สำเร็จ แสดงข้อผิดพลาด
    echo "Connection failed: " . $e->getMessage();
}

?>
