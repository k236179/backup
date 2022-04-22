<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$id = $_POST["id"];
$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$birthday =  $_POST["birthday"];
$phone =  $_POST["phone"];
$photo =  $_POST["photo"];
$createTime = date('Y-m-d H:i:s');
$valid = $_POST["valid"];

$sql="UPDATE user SET name='$name',account='$account',password='$password',gender='$gender',birthday='$birthday',phone='$phone',photo='$photo',createTime='$createTime' ,valid='$valid' WHERE id='$id'";


    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo "<script>alert('更新成功!');location.href=document.referrer;</script>;";
    } else {
        echo "更新資料錯誤: " . $conn->error;
        exit;
    }



