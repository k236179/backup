<!-- 新增資料php -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



if (!isset($_POST["name"])){
    echo "請透過官網到此頁";
    exit;
}

$name = $_POST["name"];

$sql = "INSERT INTO category (name) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

?>