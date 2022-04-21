<?php
require($_SERVER['DOCUMENT_ROOT'] . "../project.conn.php");


$col_name_php = $_GET["col_name_postman"];
$id = $_GET["id"];

$sql = "DELETE FROM coupon2 WHERE $col_name_php=$id";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除失敗: " . $conn->error;
    exit;
}


$conn->close();

?>