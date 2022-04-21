<?php
require("../project-conn.php");

// if (!isset($_POST["product"]) || !isset($_POST["order_info"]) || !isset($_POST["class"]) || !isset($_POST["count"]) || !isset($_POST["memo"])) {
//     echo "請透過官網到此頁";
//     exit;
// }


date_default_timezone_set("Asia/Taipei");

$user=$_POST["user"];
$coupon=$_POST["coupon"];
$create_time=date('Y-m-d H:i:s');
$delivery=$_POST["delivery"];
$receipent=$_POST["receipent"]; 
$address=$_POST["address"]; 
$pay=$_POST["pay"]; 
$status=$_POST["status"]; 

$deadline=$_POST["deadline"];
//not finish yet

$sql = "INSERT INTO order_info ( user, coupon, create_time, delivery, receipent,address ,pay ,status  ,deadline )
VALUES ('$user', '$coupon','$create_time','$delivery', '$receipent','$address', '$pay', '$status', '$deadline')
";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

// echo $id.$product.$order_info.$class.$counter.$memo;


$conn->close();

?>

<br>
<br>
<!doctype html>
<html lang="en">
  <head>
    <title>資料添加</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <a class="btn btn-secondary ms-4" href="order_info.php">回列表</a>
   
  </body>
</html>