<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT `images`.`name` AS `img_name`,`product`.* FROM images, product WHERE images.product_id = product.id";
    
    $result = $conn -> query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
?>


<style>
.product-img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

<div class="container-fluid row my-1 mx-auto">

<?php foreach($rows as $row): ?>
<?php $picture_name = $row["img_name"] ?>
<?php $pro_id = $row["id"] ?>

<div class="col-md-6 py-2 gx-4">

    <div class="card mb-3 mx-auto" style="max-width: 600px; max-height: 450px">
        <div class="row g-0 overflow-auto">
            <div class="col-md-6">
                <img src="../img/product/<?=$picture_name?>" class="product-img img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h4 class="card-title"><?=$row["name"]?></h4>
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