<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");


if (!isset($_POST["product"]) || !isset($_POST["order_info"]) || !isset($_POST["class"]) || !isset($_POST["counter"])) {
  echo "請透過官網到此頁";
  exit;
}




$product = $_POST["product"];
$order_info = $_POST["order_info"];
$class = $_POST["class"];
$counter = $_POST["counter"];
$memo = $_POST["memo"];

// echo "$product, $order_info, $class, $counter, $memo";

$sql = "INSERT INTO order_item ( product, order_info, class, counter, memo)
VALUES ('$product', '$order_info','$class','$counter', '$memo')
";

if ($conn->query($sql) === TRUE) {
  echo "新增資料完成, 商品為" . $product;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <a class="btn btn-secondary ms-4" href="order_item.php">回列表</a>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>