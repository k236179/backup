<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT `images`.`name` AS `img_name`,`product`.* FROM images, product WHERE images.product_id = product.id";
    
    $result = $conn -> query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Product Card</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        /* .product-img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        } */
    </style>
  </head>
  <body>
    <div class="container row my-4 mx-auto">

        <?php foreach($rows as $row): ?>
        <?php $picture_name = $row["img_name"] ?>
        <?php $pro_id = $row["id"] ?>
        
        <div class="col-md-6">

            <div class="card mb-3 mx-auto" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-5 my-auto">
                        <img src="../img/product/<?=$picture_name?>" class="product-img img-fluid rounded-start px-2" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><?=$row["name"]?></h5>
                            <!-- <p class="card-text"><//?= var_dump($row) ?></p> -->
    
                            <table class="table">
                                <tr>
                                    <th>價錢</th>
                                    <td colspan="3"><?=$row["price"]?></td>
                                </tr>
                                <tr>
                                    <th>建立時間</th>
                                    <td colspan="3"><?=$row["createTime"]?></td>
                                </tr>
                                <tr>
                                    <th>配送方式</th>
                                    <td><?=$row["express"]?></td>
                                    <th>庫存</th>
                                    <td><?=$row["inventory"]?></td>
                                </tr>
                                <tr>
                                    <th>上/下架</th>
                                    <td><?=$row["launched"]?></td>
                                    <th>啟用(軟刪除)</th>
                                    <td><?=$row["valid"]?></td>
                                </tr>
                                <tr>
                                    <th>商品說明</th>
                                    <td colspan="3"><?=$row["description"]?></td>
                                </tr>
                                <tr>
                                    <?php 
                                    $mergeSql = "SELECT category.name
                                    FROM product_property_category, category ,product
                                    WHERE category.id = product_property_category.category_id
                                    AND product.id = product_property_category.product_id
                                    AND product.id=$pro_id;";
        
                                    $resultCategory = $conn -> query($mergeSql);
                                    $rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC); ?>
                                    
                                    <th>商品分類</th>
                                    <?php foreach($rowsCategory as $Category): ?>
                                    <td><span class="badge rounded-pill bg-light text-dark border"><?=$Category["name"]?></span></td>
                                    <?php endforeach; ?>
    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>