<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



// if (!isset($_POST["product"]) || !isset($_POST["order_info"]) || !isset($_POST["class"]) || !isset($_POST["count"]) || !isset($_POST["memo"])) {
//     echo "請透過官網到此頁";
//     exit;
// }


date_default_timezone_set("Asia/Taipei");

$user = $_POST["user"];
$coupon = $_POST["coupon"];
$create_time = date('Y/m/d/H/i/s');
$delivery = $_POST["delivery"];
$receipent = $_POST["receipent"];
$address = $_POST["address"];
$pay = $_POST["pay"];
$status = $_POST["status"];

$deadline = $_POST["deadline"];
//not finish yet

// $sql = "INSERT INTO order_info (user,coupon,create_time,delivery,receipent,address,pay,status,deadline)
// VALUES ('$user','$coupon','$create_time','$delivery','$receipent','$address','$pay','$status','$deadline')";
$sql = "INSERT INTO `order_info` (`user`, `coupon`, `create_time`, `delivery`, `receipent`, `pay`, `status`, `deadline`, `address`) 
VALUES ('$user', '$coupon', '$create_time', '$delivery', '$receipent', '$pay', '$status', '$deadline', '$address');";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

// echo $id.$product.$order_info.$class.$counter.$memo;


$conn->close();