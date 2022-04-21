<?php
require("../project-conn.php");

$id=$_POST["id"];
$product=$_POST["product"];
$order_info=$_POST["order_info"];
$class=$_POST["class"];
$counter=$_POST["counter"];
$memo=$_POST["memo"];
$valid=$_POST["valid"];



$sql= "UPDATE order_item SET product='$product',order_info='$order_info', class='$class', counter='$counter', memo='$memo', valid='valid' WHERE id='$id'";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    // echo "更新成功";
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
    
} else {
    echo "更新資料錯誤: " . $conn->error;
    
}

$conn->close();
// header("location: ../page/order_item.php");

?>