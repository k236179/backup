<?php
require("../project-conn.php");

$id=$_GET["id"];
// echo $id;

$sql="DELETE FROM order_info WHERE id='$id'";
// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    
} else {
    echo "刪除資料錯誤: " . $conn->error;
    
}

$conn->close();
header("location: order_info.php");

?>