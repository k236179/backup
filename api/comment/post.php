<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


// if (!isset($_POST["userId"]) || !isset($_POST["productId"]) || !isset($_POST["score"])) {
//     echo "請透過官網到此頁";
//     exit;
// }

$user = $_POST["userId"];
$product = $_POST["productId"];
$content = $_POST["content"];
$score = $_POST["score"];
$createTime = date("Y/m/d/H/i/s");


echo "新增成功";

$sql = "INSERT INTO comment (user, product, content, score, createTime)
VALUES ('$user', '$product', '$content','$score','$createTime')
";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
    // echo "<script>alert('新增資料完成!');</script>;";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();