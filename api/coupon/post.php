<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
//$_SERVER['DOCUMENT_ROOT'] == C:\xampp\htdocs

$name = $_POST["name"];
$code = $_POST["code"];
$discount = $_POST["discount"];
// $expiry = $_POST["startY"] . "/" . $_POST["startM"] . "/" . $_POST["startD"] . "/" . $_POST["startH"] . "|" . $_POST["endY"] . "/" 
// . $_POST["endM"] . "/" . $_POST["endD"] . "/" . $_POST["endH"];
$expiry = $_POST["date1"] . "/" . $_POST["startH"] . "|" . $_POST["date2"] . "/" . $_POST["endH"];

if (isset($_POST["limited"])) {
    $limited = $_POST["limited"];
} else {
    $limited = 0;
}
// 值是0=次數無使用限制
// 值>0 值是多少=可以使用的次數限制

//valid 預設值是1 所以不需要設定

if (!isset($_POST["name"]) || !isset($_POST["code"]) || !isset($_POST["discount"]) || !$expiry) {
    echo "請透過官網到此頁";
    exit;
}

$sql = "INSERT INTO coupon (name, code, discount, expiry, limited)
VALUES ('$name', '$code','$discount','$expiry', '$limited')";
//這裡也不需要valid

if ($conn->query($sql) === TRUE) {
    $conn->close();
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
} else {
    echo "新增資料錯誤: " . $conn->error;
    $conn->close();
}
