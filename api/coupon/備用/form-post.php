<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
$sql = "SELECT * FROM coupon ";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <h1>新增優惠券</h1>
        <!-- 表單 -->
        <form action="post.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="inpit1" class="form-label">name</label>
                <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
                <input type="text" class="form-control" name="name" id="name" placeholder="輸入">
            </div>
            <div class="mb-3">
                <label for="inpit1" class="form-label">code</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="輸入">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">discount折扣</label>
                <input type="text" class="form-control" name="discount" id="discount" placeholder="%記得換算">
            </div>

            <div class="mb-2">
                <label for="inpit1">expiry</label>
                <div class="row">
                    <div class="col">
                        <input type="text" id="startY" class="form-control" name="startY" placeholder="YYYY" required>年
                    </div>
                    <div class="col">
                        <input type="text" id="startY" class="form-control" name="startM" placeholder="MM" required>月
                    </div>
                    <div class="col">
                        <input type="text" id="startY" class="form-control" name="startD" placeholder="DD" required>日
                    </div>
                    <div class="col">
                        <input type="text" id="startY" class="form-control" name="startH" placeholder="24H" required>時
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" id="endY" class="form-control" name="endY" placeholder="YYYY" required>年
                        </div>
                        <div class="col">
                            <input type="text" id="endM" class="form-control" name="endM" placeholder="MM" required>月
                        </div>
                        <div class="col">
                            <input type="text" id="endD" class="form-control" name="endD" placeholder="DD" required>日
                        </div>
                        <div class="col">
                            <input type="text" id="endH" class="form-control" name="endH" placeholder="24H" required>時
                        </div>

                        <div class="mb-3">
                            <label for="inpit1" class="form-label">litmited</label>
                            <input type="text" class="form-control" name="limited" id="limited" placeholder="輸入">
                        </div>



                        <!-- 送出按鈕 -->
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
                    <td>name</td>
                    <td>code</td>
                    <td>discount</td>
                    <td>expiry</td>
                    <td>limited</td>
                    <td>valid</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["code"] ?></td>
                        <td><?= $row["discount"] ?></td>
                        <td><?= $row["expiry"] ?></td>
                        <td><?= $row["limited"] ?></td>
                        <td><?= $row["valid"] ?></td>
                        <td><a class="btn btn-info text-white" href="form-post-edit.php?id=<?= $row["id"] ?>">編輯</a></td>

                        <td>
                            <a class="btn btn-danger" href="form-post-delete.php?id=<?= $row["id"] ?>">刪除</a>
                        </td>
                        </form>
                        <td><a class="btn btn-info text-white" href="form-post-detail.php?id=<?= $row["id"] ?>">詳細</a>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>



</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>