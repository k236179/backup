<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT `images`.`name` AS `img_name`,`product`.* FROM images, product WHERE images.product_id = product.id";
    
    $result = $conn -> query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // $product = $_GET["product_id"]
    // $sql = "SELECT * FROM images WHERE images.product_id = $product";
    // $result = $conn -> query($sql);
    // $imgCount = $result -> num_rows;
?>


<style>
.product-img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    background-attachment: local, scroll;
}
.card{
    z-index: -2;
}
.table-background{
    background-color: #f7f7f78a;
}
</style>

<div class="container-fluid row my-1 mx-auto">

<?php foreach($rows as $row): ?>
<?php $picture_name = $row["img_name"] ?>
<?php $pro_id = $row["id"] ?>

<div class="col-lg-4 col-md-6 py-2 gx-4">

    <div class="card shadow mb-3 mx-auto position-relative overflow-auto" style="max-width: 400px; height: 450px">
        <div class="row g-0">
            <!-- <div class="col-md-6"> -->
                <img src="../img/product/<?=$picture_name?>" class="product-img position-absolute rounded-start" alt="...">
            <!-- </div> -->

            <div class="card-body py-4 px-5">
                <div class="table-background p-3 rounded-3">
                    <h4 class="card-title fw-bold text-center"><?=$row["name"]?></h4>
                    <!-- <p class="card-text"><//?= var_dump($row) ?></p> -->
    
                    <table class="table">
                        <tr>
                            <th class="text-nowrap">價錢</th>
                            <td colspan="3"><?=$row["price"]?></td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">建立時間</th>
                            <td colspan="3"><?=$row["createTime"]?></td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">配送方式</th>
                            <td><?=$row["express"]?></td>
                            <th class="text-nowrap">庫存</th>
                            <td><?=$row["inventory"]?></td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">上/下架</th>
                            <td><?=$row["launched"]?></td>
                            <th class="text-nowrap">啟用(軟刪除)</th>
                            <td><?=$row["valid"]?></td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">商品說明</th>
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
                            
                            <th class="text-nowrap">商品分類</th>
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


<!-- 輪播圖 -->
<!-- <//?php $picture_name = $row["img_name"] ?> -->


<!-- <//?php 
    $product = $_GET["product_id"]
    $sql = "SELECT * FROM images WHERE images.product_id = $product";
    $result = $conn -> query($sql);
    $imgCount = $result -> num_rows; ?> -->

<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/product/<?=$picture_name?>" class="d-block w-100" alt="...">
    </div>
    <!-- <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>