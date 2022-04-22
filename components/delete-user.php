<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$id = $_GET["id"];

$sql = "DELETE FROM user WHERE id=$id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除失敗: " . $conn->error;
    exit;
}

$conn->close();
?>

