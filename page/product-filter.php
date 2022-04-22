<?php
    // 篩選條件
    if(!isset($_GET["min"])){
        $min = 0;
    }else{
        $min = $_GET["min"];
        if(empty($min)){
            $min = 0;
        }
    }

    if(!isset($_GET["max"])){
        $max = 2000;
    }else{
        $max = $_GET["max"];
        if(empty($max)){
            $max = 2000;
        }
    }

    // if(!isset($_GET["express"])){
    //     $express = "";
    //     $string = "";
    // }else{
    //     $express = $_GET["express"];
    //     $string = "AND express =";
    // }

    if(!isset($_GET["minInventory"])){
        $minInventory = 0;
    }else{
        $minInventory = $_GET["minInventory"];
        if(empty($minInventory)){
            $minInventory = 0;
        }
    }

    if(!isset($_GET["maxInventory"])){
        $maxInventory = 500;
    }else{
        $maxInventory = $_GET["maxInventory"];
        if(empty($maxInventory)){
            $maxInventory = 200;
        }
    }

    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT * FROM product WHERE valid = 1 AND product.price >= $min AND product.price <= $max AND product.inventory >= $minInventory AND product.inventory <= $maxInventory";
    
    $result = $conn -> query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Product Filter</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <div class="row gx-2">
            <!-- 篩選條件 -->
            <form action="">
                <!-- <div class="my-2">
                    <label for="">種類</label>
                    <select class="form-control" name="" id="">
                        <option value=""></option>
                        <option value="">派</option>
                        <option value="">塔</option>
                    </select>
                </div> -->
                <div class="col-auto my-2">
                    <label class="col-form-label">價錢</label>
                    <!-- col-form-label => 文字置中 -->
                </div>
                <div class="col-auto my-2">
                    <input type="number" class="form-control" min="0" name="min" value="<?=$min?>">
                </div>
                <div class="col-auto my-2">
                    <label class="col-form-label">~</label>
                </div>
                <div class="col-auto my-2">
                    <input type="number" class="form-control" name="max" value="<?=$max?>">
                </div>
                
                <!-- <div class="mb-2">
                    <label for="">配送方式</label>
                    <select class="form-control" name="express" id="">
                        <option value="<?=$express=''?>"></option>
                        <option value="<?=$express=0?>">0</option>
                        <option value="<?=$express=1?>">1</option>
                        <option value="<?=$express=2?>">2</option>
                    </select>
                </div> -->
                
                <div class="col-auto my-2">
                    <label class="col-form-label">庫存</label>
                </div>
                <div class="col-auto my-2">
                    <input type="number" class="form-control" min="0" name="minInventory" value="<?=$minInventory?>">
                </div>
                <div class="col-auto my-2">
                    <label class="col-form-label">~</label>
                </div>
                <div class="col-auto my-2">
                    <input type="number" class="form-control" name="maxInventory" value="<?=$maxInventory?>">
                </div>

                <div class="col-auto my-2">
                    <button type="submit" class="btn btn-secondary text-white">篩選</button>
                </div>
            </form>
        </div>


        <!-- 顯示篩選結果 -->
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">名稱</th>
                <th scope="col">商品分類</th>
                <th scope="col" class="text-center">價格</th>
                <th scope="col" class="text-nowrap text-center">配送方式</th>
                <th scope="col" class="text-nowrap text-center">庫存</th>
                <th scope="col" class="text-nowrap text-center">上/下架</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <?php
                    // $product_id = $row['id'];
                    // $sql = "SELECT * FROM product_property_category WHERE product_id = $product_id ";
                    // $result = $conn->query($sql)->fetch_all();

                    // $product_id = $row['id'];
                    // $sql = "SELECT * FROM product_property_category WHERE product_id = $product_id ";
                    // $result = $conn->query($sql)->fetch_all();
                    
                    $sql = "SELECT product.*, product_property_category.product_id FROM product 
                    JOIN product_property_category ON product.id = product_property_category.id";
                    $result = $conn->query($sql)->fetch_all();

                    $sql = "SELECT category.*, product_property_category.category_id FROM category 
                    JOIN product_property_category ON category.id = product_property_category.id";
                    $result = $conn->query($sql)->fetch_all();

                ?>
            <tr>
                <th scope="row"><?= $row["id"] ?></th>
                <td><?= $row["name"] ?></td>
                <td><?=json_encode($result)?></td>
                <td class="text-end"><?= $row["price"] ?></td>
                <td class="text-end"><?= $row["express"] ?></td>
                <td class="text-end"><?= $row["inventory"] ?></td>
                <td class="text-end"><?= $row["launched"] ?></td>
            </tr>
            <tr>
                <th scope="row">產品說明</th>
                <td colspan="6"><?= $row["description"] ?></td>
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


