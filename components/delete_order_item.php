<?php
require("../project-conn.php");

$id=$_GET["id"];
// echo $id;

$sql="DELETE FROM order_item WHERE id='$id'";
// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('刪除資料完成!');location.href=document.referrer;</script>;";
    
} else {
    echo "刪除資料錯誤: " . $conn->error;
    
}

$conn->close();


?>