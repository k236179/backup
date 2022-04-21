<?php
require("../project-conn.php");

$sql="SELECT * FROM order_info";

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

    <title>order-info </title>
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
        <form action="post_info.php" method="post">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="" class="form-label">使用者名稱</label>
                <input type="text" class="form-control" name="user" id="user" placeholder="輸入使用者名稱">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="" class="form-label">優惠券</label>
                <input type="text" class="form-control" name="coupon" id="coupon" placeholder="輸入優惠券">
            </div>

            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="" class="form-label">配送方法</label>
                <input type="text" class="form-control" name="delivery" id="delivery" placeholder="輸入配送方法">
            </div>

            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="" class="form-label">收件人</label>
                <input type="text" class="form-control" name="receipent" id="receipent" placeholder="輸入收件人">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="" class="form-label">配送地址</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="輸入配送地址">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="" class="form-label">付款方式</label>
                <input type="text" class="form-control" name="pay" id="pay" placeholder="輸入付款方式">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="" class="form-label">配送狀態</label>
                <input type="text" class="form-control" name="status" id="status" placeholder="輸入配送狀態">
            </div>

             <!-- 普通欄位 -->
             <div class="mb-3">
                <label for="" class="form-label">截止日期</label>
                <input type="text" class="form-control" name="deadline" id="deadline" placeholder="輸入截止日期">
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
                    <th scope="col">user</th>
                    <th scope="col">coupon</th>
                </tr>
            </thead>
            <tbody>
                <?php if($rows>0): ?>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <th scope="row"><?= $row["id"] ?></th>
                            <td><?= $row["user"] ?></td>
                            <td><?= $row["coupon"] ?></td>
                            <td><a href="order_info_detail.php?id=<?=$row["id"]?>" class="btn btn-secondary">詳細資料</a> </td>
                        </tr>
                    <?php endforeach ?>
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