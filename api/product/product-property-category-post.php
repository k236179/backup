<!-- 新增資料php -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



if (!isset($_POST["product_id"]) || !isset($_POST["category_id"])) {
    echo "請透過官網到此頁";
    exit;
}

$product_id = $_POST["product_id"];
$category_id = $_POST["category_id"];


$sql = "INSERT INTO product_property_category (product_id, category_id)
    VALUES ('$product_id','$category_id')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

?>