<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");


// if (!isset($_POST["userID"]) || !isset($_POST["name"]) || !isset($_POST["account"]) || !isset($_POST["password"]) || !isset($_POST["gender"]) || !isset($_POST["birthday"]) || !isset($_POST["phone"]) || !isset($_POST["photo"])) {
//     // echo "請透過官網到此頁";
//     exit;
// }

// $user = $_POST["userId"];
$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$birthday =  $_POST["birthday"];
$phone =  $_POST["phone"];
$photo =  $_POST["photo"];
$createTime = date('Y-m-d H:i:s');
// $valid = $_POST["valid"];



$sql = "INSERT INTO user (name, account, password, gender, birthday, phone, photo,createTime)
VALUES ('$name', '$account', '$password','$gender','$birthday','$phone','$photo','$createTime')
";



if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();
// header("location: user-form.php");