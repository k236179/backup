<?php
require("../project-conn.php");

$sql= "SELECT * FROM order_item";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// if($rows>0){
//     foreach($rows as $row){
//         var_dump($row);
//     }
// }
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

    <title>order-item</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
    <div class="form shadow p-3">
        <!-- 表單 -->
        <form action="post_item.php" method="post">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="inpit1" class="form-label">產品名稱</label>
                <input type="text" class="form-control" name="product" id="product" placeholder="請輸入產品名稱">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="inpit1" class="form-label">產品資訊</label>
                <input type="text" class="form-control" name="order_info" id="order_info" placeholder="請輸入產品資訊">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="inpit1" class="form-label">課程名稱</label>
                <input type="text" class="form-control" name="class" id="class" placeholder="請輸入課程名稱">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="inpit1" class="form-label">數量</label>
                <input type="text" class="form-control" name="counter" id="counter" placeholder="請輸入數量">
            </div>

            
            <!-- 文字方塊 -->
            <div class="mb-3">
                <label for="text1" class="form-label">備註</label>
                <textarea class="form-control" name="memo" id="memo" rows="3" placeholder="請輸入備註"></textarea>
            </div>

            <!-- 送出按鈕 -->
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
            </div>
        </form>

    </div>

    <!-- 清單 -->
    <div class="form shadow p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">ORDER INFORMATION</th>
                    <th scope="col">CLASS</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col">MEMO</th>
                </tr>
            </thead>
            <tbody>
                    <?php if($rows>0): ?>
                        <?php  foreach($rows as $row): ?>
                            <tr>
                                <th scope="row"><?=$row["id"] ?></th>
                                <td><?=$row["product"] ?></td>
                                <td><?=$row["order_info"] ?></td>
                                <td><?=$row["class"] ?></td>
                                <td><?=$row["counter"] ?></td>
                                <td><?=$row["memo"] ?></td>
                                <td><a class="btn btn-secondary" href="order_item_edit.php?id=<?=$row["id"]?>">編輯</a> </td>
                                <td><a class="btn btn-danger" href="order_item_delete.php?id=<?=$row["id"]?>" type="submit">刪除</a> </td>
                            </tr>
                        <?php  endforeach; ?>
                    <?php endif; ?>
               
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


<!-- jquery ajax -->
<!-- 
$.ajax({
            method: "POST",
            url: "api-users.php",
            dataType: "json",
        })
        .done(function(response) {
            // console.log(response)
            response.forEach(function(user) {
                document.write(`${user.name}: ${user.email}<br>`);
            })

        }).fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        }); 
-->