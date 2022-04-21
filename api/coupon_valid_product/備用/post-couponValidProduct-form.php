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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
     
    <div class="form shadow p-3">
         <h1>新增適用範圍</h1>
        <!-- 表單 -->
        <form action="post2.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="product_id" class="form-label">商品ID</label>
                <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
                <input type="number" class="form-control" name="product_id" id="product_id" placeholder="輸入">
            </div>
            <div class="mb-3">
                <label for="coupon_id" class="form-label">優惠券ID</label>
                <input type="number" class="form-control" name="coupon_id" id="coupon_id" placeholder="輸入">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
            </div>
        </form>

    </div>
    
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
                    <td>
                    <a class="btn btn-danger" 
                     href="deleteByIdCoupon.php?id=<?=$row["id"]?>">刪除</a>
                    </td>
                </tr>
                 <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    
</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>