<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$id=$_POST["id"];
$coupon=$_POST["coupon"];
$class=$_POST["class"];
// $valid=$_POST["valid"];
// echo $name;

$sql="UPDATE coupon_valid_class SET coupon='$coupon', class='$class' WHERE id='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    header("Refresh:1 ;url= /project/page/index.php?current=coupon_valid_class");
    $conn->close();
} else {
    echo "更新資料錯誤: " . $conn->error;
    exit;
}




?>