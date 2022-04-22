<!-- 新增資料php -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



if (!isset($_POST["name"]) || !isset($_POST["product_id"])) {
    echo "請透過官網到此頁";
    exit;
}

$name = $_POST["name"];
$product_id = $_POST["product_id"];

$sql = "INSERT INTO images (name, product_id) VALUES ('$name','$product_id')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

?>