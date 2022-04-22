<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



$id = $_GET["id"];


$sql = "DELETE FROM coupon WHERE id='$id'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    //     echo "刪除成功";
    $conn->close();
    echo "<script>alert('刪除資料成功!');location.href=document.referrer;</script>;";
} else {
    echo "刪除失敗: " . $conn->error;
}



// header("lacation: form-post.php");