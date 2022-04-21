<?php

require($_SERVER['DOCUMENT_ROOT'] . "../project.conn.php");
$sql = "SELECT * FROM coupon_valid_product ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);


//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候
// $sql = "SELECT * FROM product ";
// $result = $conn->query($sql);
// $productRows = $result->fetch_all(MYSQLI_ASSOC);


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <div class="container shadow">
        <table class="table">
            <thead>
                <tr>
                <td>id</td>
                <td>product id</td>
                <td>coupon id</td>
                <td></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row) : ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["product_id"]?></td>
                    <td><?=$row["coupon_id"]?></td>
                    
                </tr>
                 <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>