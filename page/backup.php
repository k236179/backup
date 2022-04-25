<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

// $sql = "SELECT `images`.`name` AS `img_name`,`product`.* FROM images, product WHERE images.product_id = product.id";

$sql = "SELECT `images`.`name` AS `img_name`,`product`.*, COUNT(product_id) as times FROM images, product WHERE images.product_id = product.id  GROUP BY product_id";

$result = $conn -> query($sql);
$rows = $result -> fetch_all(MYSQLI_ASSOC);

?>


<style>
.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    /* background-attachment: local, scroll; */
}

.card {
    z-index: -2;
}
</style>

<div class="container-fluid row my-1 mx-auto">
<?php $count = 1?>
    <?php foreach ($rows as $row) : ?>
    <?php $picture_name = $row["img_name"] ?>
    <?php $pro_id = $row["id"] ?>
    <!-- <//?php $pro_id_count = $rows["id"] ?> -->
    <div class="col-md-6">

        <div class="card shadow mx-auto overflow-auto" style="max-width: 500px; height: 360px">
            <div class="row">

                <?php 
                $sql = "SELECT * FROM images WHERE product_id = $pro_id";
                $result = $conn -> query($sql);
                $imgRows = $result -> fetch_all(MYSQLI_ASSOC);
                ?>
                
                <!-- <//?php if ($result -> num_rows <= 1) : ?> -->

                <!-- <//?php else : ?> -->
                <!-- 多張圖 -->

                    <div class="col-md-5 position-relative">
                        <img src="../img/product/<?= $picture_name ?>" class="product-img position-absolute img-fluid rounded-start" alt="...">
                    </div>

                    <div class="col-md-7">
                        <div class="card-body py-3 px-3">
                                <h4 class="card-title fw-bold text-center"><?= $row["name"] ?></h4>
        
                                <table class="table">
                                    <tr>
                                        <th class="text-nowrap">價錢</th>
                                        <td colspan="3"><?= $row["price"] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">建立時間</th>
                                        <td colspan="3"><?= $row["createTime"] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">配送方式</th>
                                        <td><?= $row["express"] ?></td>
                                        <th class="text-nowrap">庫存</th>
                                        <td><?= $row["inventory"] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">上/下架</th>
                                        <td><?= $row["launched"] ?></td>
                                        <th class="text-nowrap">啟用(軟刪除)</th>
                                        <td><?= $row["valid"] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">商品說明</th>
                                        <td colspan="3"><?= $row["description"] ?></td>
                                    </tr>
                                    <tr>
                                        <?php
                                            $mergeSql = "SELECT category.name
                                    FROM product_property_category, category ,product
                                    WHERE category.id = product_property_category.category_id
                                    AND product.id = product_property_category.product_id
                                    AND product.id=$pro_id;";
        
                                            $resultCategory = $conn->query($mergeSql);
                                            $rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC); ?>
        
                                        <th class="text-nowrap">商品分類</th>
                                        <?php foreach ($rowsCategory as $Category) : ?>
                                        <td><span
                                                class="badge rounded-pill bg-light text-dark border"><?= $Category["name"] ?></span>
                                        </td>
                                        <?php $count++?>
                                        <?php endforeach; ?>
        
                                    </tr>
                                </table>
                        </div>
                    </div>
                    
                </div>
                </div>
                <!-- <//?php endif; ?> -->


            </div>
        </div>

    </div>
    <?php endforeach; ?>
</div>