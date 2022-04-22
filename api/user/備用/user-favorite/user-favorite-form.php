<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");
$sql = "SELECT * FROM user_favorite";
// $sql = "SELECT `product_id` FROM `user_favorite`,`user` WHERE `user_favorite`.`user_id`=`user`.`id` AND `user_id`='1';";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
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

    <title>User Favorite</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
     
    <div class="form shadow p-3">
         <h1>會員收藏</h1>
        <!-- 表單 -->
        <form action="user-favorite-post.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="user_id" class="form-label">userID</label>
                <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
                <input type="number" class="form-control" name="user_id" id="user_id" placeholder="輸入">
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">productID</label>
                <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
                <input type="number" class="form-control" name="product_id" id="product_id" placeholder="輸入">
            </div>
            <div class="mb-3">
                <label for="class_id" class="form-label">classID</label>
                <input type="number" class="form-control" name="class_id" id="class_id" placeholder="輸入">
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
                <td>user id</td>
                <td>product id</td>
                <td>class id</td>
                <td></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row) : ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["user_id"]?></td>
                    <td><?=$row["product_id"]?></td>
                    <td><?=$row["class_id"]?></td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="user-edit.php?id=<?=$row["id"]?>">編輯</a>
                    </td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="deleteListById.php?id=<?=$row["id"]?>">刪除</a>
                    </td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="user.php?id=<?=$row["id"]?>">詳細</a>
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