<?php
require("../project-conn.php");

$sql= "SELECT * FROM order_item";

$id = $_GET["id"];
$id_type = $_GET["id_type"];
$block = $_GET["block"];


$sql = "SELECT * FROM order_item WHERE $id_type = $id";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

foreach ($rows as $row) {
    $target = $row['id'];
    $sql = "UPDATE order_item SET valid='$block' WHERE id='$target'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "更新資料錯誤: " . $conn->error;
        exit;
    }
}
echo "更新成功";

$conn->close();




?>