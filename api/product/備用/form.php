<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");
    
    $sql = "SELECT * FROM product WHERE valid = 1";

    $result = $conn -> query($sql);
    $rows = $result -> fetch_all(MYSQLI_ASSOC);

    // var_dump($rows);
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
        <!-- 表單 -->
        <form action="post.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="name" class="form-label">商品名稱</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="商品名稱">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">價格
                </label>
                <input type="number" class="form-control" name="price" id="price" min="0" placeholder="商品價格">
            </div>
            <div class="mb-3">
                <label for="express" class="form-label">配送方式</label>
                <input type="number" class="form-control" name="express" id="express" min="0" max="2" placeholder="1:常溫, 2:低溫, 0:不可配送">
            </div>
            <div class="mb-3">
                <label for="inventory" class="form-label">庫存</label>
                <input type="number" class="form-control" name="inventory" id="inventory" min="0" placeholder="商品庫存">
            </div>
            <div class="mb-3">
                <label for="launched" class="form-label">上/下架</label>
                <input type="number" class="form-control" name="launched" id="launched" min="0" max="1" placeholder="1:上架, 0:下架">
            </div>

            <!-- 文字方塊 -->
            <div class="mb-3">
                <label for="description" class="form-label">產品說明</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="產品說明文字"></textarea>
            </div>

            <!-- 圖片上傳 -->
            <div class="mb-3">
                <label for="images" class="form-label">商品圖片</label>
                <input type="file" class="form-control" name="images" id="images">
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
                    <th scope="col">名稱</th>
                    <th scope="col">價格</th>
                    <th scope="col" class="text-nowrap">配送方式</th>
                    <th scope="col" class="text-nowrap">庫存</th>
                    <th scope="col" class="text-nowrap">上/下架</th>
                    <th scope="col">產品說明</th>
                    <!-- <th scope="col">商品圖片</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <th scope="row"><?=$row["id"]?></th>
                    <td><?=$row["name"]?></td>
                    <td class="text-end"><?=$row["price"]?></td>
                    <td class="text-end"><?=$row["express"]?></td>
                    <td class="text-end"><?=$row["inventory"]?></td>
                    <td class="text-end"><?=$row["launched"]?></td>
                    <td><?=$row["description"]?></td>
                    <!-- <td><//?=$row["images"]?></td> -->
                    <td class="text-nowrap"><a href="edit_form.php?id=<?=$row["id"]?>" class="btn btn-secondary">編輯</a></td>
                    <td class="text-nowrap"><a href="deleteListById.php?id=<?=$row["id"]?>" class="btn btn-danger">刪除</a></td>
                    <td class="text-nowrap"><a href="" class="btn btn-secondary">預留</a></td>
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