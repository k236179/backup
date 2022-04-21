<?php
$servername = "localhost";
$username = "admin";
$password = "123456";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
} else {
    // echo "<script>alert('連結小專DB');</script>";
}