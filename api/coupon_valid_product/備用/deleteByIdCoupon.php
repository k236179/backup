<?php
require($_SERVER['DOCUMENT_ROOT'] . "../project.conn.php");

$id= $_GET["id"];
// $product_id = $_GET["product_id"];
// $coupon_id = $_GET["coupon_id"];

$sql = "DELETE FROM coupon_valid_product WHERE id='$id'";

// $sql = "DELETE FROM coupon_valid_product WHERE coupon_id=$coupon_id AND product_id=$product_id";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    
    echo "<script>alert('刪除資料成功!');location.href=document.referrer;</script>;";
} else {
    echo "刪除失敗: " . $conn->error;
    exit;
}


$conn->close();

?>