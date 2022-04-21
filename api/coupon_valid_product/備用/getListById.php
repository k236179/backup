<?php
require($_SERVER['DOCUMENT_ROOT'] . "../project.conn.php");

$col_name_php = $_GET["col_name_postman"];
$id = $_GET["id"];
// $coupon_id=$_GET["coupon_id"];
// $product_id=$_GET["product_id"];

// $sql = "SELECT * FROM coupon2   ";

// $sql = "SELECT * FROM coupon2 WHERE coupon_id=$coupon_id OR product_id=$product_id ";
// 上面的方法不能用，因為兩個都必須要給值，但我們只需要搜索其中一個
$sql = "SELECT * FROM coupon_valid_product  WHERE $col_name_php = $id";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($rows);

$conn->close();

?>