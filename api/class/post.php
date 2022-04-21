<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



// if (!isset($_POST["id"]) || !isset($_POST["name"]) || !isset($_POST["date"])) {
//     echo "請透過官網到此頁";
//     exit;
// }

$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$date = $_POST["date"];
$duration = $_POST["duration"];


$sql = "INSERT INTO lessons ( name, price, description, date, duration, valid)
VALUES ('$name', '$price','$description','$date','$duration', 1)
";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}



$conn->close();