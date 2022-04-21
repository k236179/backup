<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
//$_SERVER['DOCUMENT_ROOT'] == C:\xampp\htdocs

$product_id = $_POST["product_id"];
$coupon_id = $_POST["coupon_id"];




if (!isset($_POST["product_id"]) || !isset($_POST["coupon_id"])) {
    echo "請新增正確的產品or coupon";
    exit;
}


$sql = "INSERT INTO coupon_valid_product (product_id, coupon_id)
VALUES ('$product_id', '$coupon_id')";
//這裡也不需要valid

if ($conn->query($sql) === TRUE) {
    $conn->close();
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
} else {
    echo "新增資料錯誤: " . $conn->error;
    $conn->close();
}