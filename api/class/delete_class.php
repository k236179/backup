<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$id = $_GET["id"];
// $id_type = $_GET["id_type"];


$sql = "DELETE FROM lessons WHERE id='$id'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("Refresh:1 ;url= /project/page/index.php?current=class");
} else {
    echo "刪除失敗: " . $conn->error;
    exit;
}



$conn->close();