<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    date_default_timezone_set('Asia/Bangkok');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=bannaprue_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>