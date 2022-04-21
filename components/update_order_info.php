<?php
require("../project-conn.php");

$id=$_POST["id"];
$user=$_POST["user"];
$coupon=$_POST["coupon"];
// $create_time=$_POST["create_time"];
$delivery=$_POST["delivery"];
$receipent=$_POST["receipent"];
$address=$_POST["address"];
$pay=$_POST["pay"];
$status=$_POST["status"];
$valid=$_POST["valid"];
$deadline=$_POST["deadline"];



$sql= "UPDATE order_info SET user='$user',coupon='$coupon', delivery='$delivery', receipent='$receipent', address='$address', pay='$pay', status='$status',valid='$valid', deadline='$deadline' WHERE id='$id'";

// echo $sql;



if ($conn->query($sql) === TRUE) {
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
    
} else {
    echo "更新資料錯誤: " . $conn->error;
    
}

$conn->close();


?>

