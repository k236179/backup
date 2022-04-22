<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$user_id = $_POST["user_id"];
$product_id = $_POST["product_id"];
$class_id = $_POST["class_id"];
 

$sql = "INSERT INTO user_favorite (user_id, product_id, class_id)
VALUES ('$user_id','$product_id', '$class_id')";


if ($conn->query($sql) === TRUE) {
    echo '會員收藏新增成功';
} else {
    echo "會員收藏新增錯誤: " . $conn->error;
}

$conn->close();

header("location: user-favorite-form.php");
?>