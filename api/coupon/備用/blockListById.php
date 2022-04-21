<?php
require($_SERVER['DOCUMENT_ROOT'] . "/coupon/project-conn.php");


$id=$_POST["id"];
$name = $_POST["name"];
$code = $_POST["code"];
$discount = $_POST["discount"];
$expiry = $_POST["expiry"];
$limited = $_POST["limited"];
$valid = $_POST["valid"];

// $block = $_POST["block"];


// $sql = "SELECT * FROM coupon WHERE id= '$id'";
$sql = "UPDATE coupon SET name='$name', code='$code', discount='$discount', expiry='$expiry', limited='$limited', valid='$valid' WHERE id='$id'";


    if ($conn->query($sql) === TRUE) {
        echo "更新成功";
     $conn->close();
     header("location: form-post-detail.php?id=".$id);
    } else {
        echo "更新資料錯誤: " . $conn->error;
        exit;
    }



?>