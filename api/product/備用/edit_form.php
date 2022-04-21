<!-- 修改資料表單 -->

<?php
    if(!isset($_GET["id"])){
        header("location: 404.php");
    }

    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $id = $_GET["id"];
    $sql = "SELECT * FROM product WHERE id = '$id' AND valid = 1";

    $result = $conn -> query($sql);
    $rows = $result -> fetch_all(MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Update Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container mt-5">

        <div class="form shadow p-3">
            <form action="updateListById.php" method="POST">
                <div class="py-2">
                    <a class="btn btn-info text-white" href="form.php">
                         回列表
                    </a>
               </div>
                <!-- 表單 -->
                <table class="table table-lg">
                    <?php foreach($rows as $row): ?>
                        <input type="hidden" name = "id" value = "<?=$row["id"]?>">
                        <tr>
                            <th>id</th>
                            <td><?=$row["id"]?></td>
                        </tr>
                        <input type="hidden" name = "createTime" value = "<?=$row["createTime"]?>">
                        <tr>
                            <th>createTime</th>
                            <td><?=$row["createTime"]?></td>
                        </tr>
                        <tr>
                            <th scope="col">名稱</th>
                            <td>
                                <input class="form-control" name="name" type="text" value="<?=$row["name"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">價格</th>
                            <td>
                                <input class="form-control" name="price" type="number" value="<?=$row["price"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">配送方式</th>
                            <td>
                                <input class="form-control" name="express" type="number" min="0" max="2" value="<?=$row["express"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">庫存</th>
                            <td>
                                <input class="form-control" name="inventory" type="number" min="0" value="<?=$row["inventory"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">上/下架</th>
                            <td>
                                <input class="form-control" name="launched" type="number" min="0" max="1" value="<?=$row["launched"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">軟刪除</th>
                            <td>
                                <input class="form-control" name="valid" type="number" min="0" max="1" value="<?=$row["valid"]?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="text-nowrap">產品說明</th>
                            <td>
                                <input class="form-control" name="description" type="text" value="<?=$row["description"]?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>

                <div class="py-2 text-end">
                    <button type="submit" class="btn btn-info text-white">儲存</button>
                    <a class="btn btn-secondary" href="form.php">取消</a>
                </div>
            </form>
        </div>

    </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>