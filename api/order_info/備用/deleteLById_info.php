<?php
require("../project-conn.php");

// if (!isset($_POST["id"]) || !isset($_POST["product"]) || !isset($_POST["order_info"]) || !isset($_POST["class"]) || !isset($_POST["count"]) || !isset($_POST["memo"])) {
//     echo "請透過官網到此頁";
//     exit;
// }

$id_type=$_GET["id_type"];

$id=$_GET["id"];

$sql = "DELETE FROM order_item WHERE $id_type = $id ";

if ($conn->query($sql) === TRUE) {
    echo "刪除完成";
} else {
    echo "刪除錯誤: " . $conn->error;
}

// echo $id


$conn->close();

?>