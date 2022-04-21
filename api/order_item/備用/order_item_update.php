<?php
require("../project-conn.php");

$id=$_POST["id"];
$product=$_POST["product"];
$order_info=$_POST["order_info"];
$class=$_POST["class"];
$counter=$_POST["counter"];
$memo=$_POST["memo"];
$valid=$_["valid"];



$sql= "UPDATE order_item SET product='$product',order_info='$order_info', class='$class', counter='$counter', memo='$memo', valid='valid' WHERE id='$id'";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    
} else {
    echo "更新資料錯誤: " . $conn->error;
    
}

$conn->close();
header("location: order_item.php");

?>