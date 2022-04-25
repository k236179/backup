<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


// if (!isset($_POST["id"]) || !isset($_POST["name"]) || !isset($_POST["date"])) {
//     echo "請透過官網到此頁";
//     exit;
// }

// $id = $_POST["id"];
$coupon = $_POST["coupon"];
$class = $_POST["class"];
// $valid = $_POST["valid"];


$sql = "INSERT INTO coupon_valid_class ( coupon, class)
VALUES ('$coupon', '$class')
";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
    header("Refresh:1 ;url= /project/page/index.php?current=coupon_valid_class");

} else {
    echo "新增資料錯誤: " . $conn->error;
}



$conn->close();

?>
