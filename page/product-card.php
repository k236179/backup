<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$expressList = array("店取", "常溫", "低溫");
$validList = array("未啟用", "啟用");
$launchedList = array("下架", "上架");

// $sql = "SELECT `images`.`name` AS `img_name`,`product`.* FROM images, product WHERE images.product_id = product.id";

// $sql = "SELECT `images`.`name` AS `img_name`,`product`.*, COUNT(product_id) as times FROM images, product WHERE images.product_id = product.id  GROUP BY product_id";

$sql = "SELECT * FROM product";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// 分頁
$total = $result->num_rows;
$per_page = 10;
$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM product WHERE valid = 1 LIMIT $start,$per_page";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
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
    p{
        margin: 5px 0;
        padding: 1px;
    }
    .multiline-ellipsis { 
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
}
</style>


<div class="container-fluid row my-1 mx-auto gy-4">

    <div class="py-2 text-end">
    第 <?= $p ?> 頁,共 <?= $page_count ?> 頁,共 <?= $total ?> 筆
    </div>

    <?php $count = 1 ?>
    <?php foreach ($rows as $row) : ?>
        <!-- <//?php $picture_name = $row["img_name"] ?> -->
        <?php $picture_name = $row["name"] ?>
        <?php $pro_id = $row["id"] ?>
        <!-- <//?php $pro_id_count = $rows["id"] ?> -->
        <!-- <//?php print_r(array_count_values($pro_id)); ?> -->

        <div class="col-md-6">

            <div class="card shadow mx-auto" style="max-width: 650px; height: 50vh; overflow-y: auto;">
                <div class="row g-0 h-100">

                    <?php
                    $sql = "SELECT * FROM images WHERE product_id = $pro_id";
                    $result = $conn->query($sql);
                    $imgRows = $result->fetch_all(MYSQLI_ASSOC);
                    ?>



                    <?php if ($result->num_rows <= 1) : ?>
                        <div class="col-md-5">
                            <img src="../img/product/<?= $picture_name ?>.jpg" class="product-img img-fluid rounded-start" alt="...">
                        </div>
                    <?php else : ?>
                        <!-- 多張圖 -->
                        <div id="carouselExampleControls" class="carousel slide col-md-5" data-bs-ride="carousel">
                            <div class="carousel-inner h-100">
                                <?php for ($i = 0; $i < $result->num_rows; $i++) : ?>
                                    <?php $imgName = $imgRows[$i]["name"] ?>
                                    <div class="h-100 carousel-item <?php if ($i == 0) {
                                                                        echo "active";
                                                                    } ?>">
                                        <img src="../img/product/<?= $imgName ?>" class="product-img d-block w-100 rounded-start " style="pointer-events: none;" alt="...">
                                    </div>
                                <?php endfor; ?>
                                <!-- <div class="carousel-item active">
                            <img src="../img/product/<//?= $picture_name ?>" class="d-block w-100 rounded-start"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div> -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                    <?php endif; ?>

                    <div class="col-md-7">
                        <div class="py-4 px-4">
                            <h4 class="card-title fw-bold text-center mb-3"><?= $row["name"] ?></h4>

                            <div class="row">
                                <div class="col-3">
                                    <p class="fw-bold">價錢</p>
                                </div>
                                <div class="col-9">
                                    <p class="bg-light border">&nbsp;<?= $row["price"] ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="fw-bold text-nowrap">建立時間</p>
                                </div>
                                <div class="col-9">
                                    <p class="bg-light border">&nbsp;<?= $row["createTime"] ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="fw-bold text-nowrap">配送方式</p>
                                </div>
                                <div class="col-3 overflow">
                                    <p class="text-nowrap bg-light border">&nbsp;<?= $expressList[$row["express"]] ?></p>
                                </div>
                                <div class="col-3">
                                    <p class="fw-bold">庫存</p>
                                </div>
                                <div class="col-3">
                                    <p class="bg-light border">&nbsp;<?= $row["inventory"] ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="fw-bold text-nowrap">上/下架</p>
                                </div>
                                <div class="col-3">
                                    <p class="bg-light border">&nbsp;<?= $launchedList[$row["launched"]] ?></p>
                                </div>
                                <div class="col-3">
                                    <p class="fw-bold">啟用<br>(軟刪除)</p>
                                </div>
                                <div class="col-3">
                                    <p class="bg-light border">&nbsp;<?= $validList[$row["valid"]] ?></p>
                                </div>

                                <div class="col">
                                    <p class="fw-bold">商品說明</p>
                                </div>
                                <div class="col-12">
                                    <p class="bg-light border multiline-ellipsis">&nbsp;<?= $row["description"] ?></p>
                                </div>

                                <?php
                                    $mergeSql = "SELECT category.name
                                        FROM product_property_category, category ,product
                                        WHERE category.id = product_property_category.category_id
                                        AND product.id = product_property_category.product_id
                                        AND product.id=$pro_id;";

                                    $resultCategory = $conn->query($mergeSql);
                                    $rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);
                                ?>
                                
                                <div class="col-3">
                                    <p class="fw-bold text-nowrap">商品分類</p>
                                </div>
                                <div class="col-9">
                                <?php foreach ($rowsCategory as $Category) : ?>
                                    <p><span
                                            class="badge rounded-pill bg-light text-dark border"><?= $Category["name"] ?></span>
                                    </p>
                                    <?php $count++ ?>
                                <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- <table class="table">
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
                                    <td><?= $expressList[$row["express"]] ?></td>
                                    <th class="text-nowrap">庫存</th>
                                    <td><?= $row["inventory"] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">上/下架</th>
                                    <td><?= $launchedList[$row["launched"]] ?></td>
                                    <th class="text-nowrap">啟用(軟刪除)</th>
                                    <td><?= $validList[$row["valid"]] ?></td>
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
                                    $rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);
                                    ?>
    
                                    <th class="text-nowrap">商品分類</th>
                                    <?php foreach ($rowsCategory as $Category) : ?>
                                    <td><span
                                            class="badge rounded-pill bg-light text-dark border"><?= $Category["name"] ?></span>
                                    </td>
                                    <?php $count++ ?>
                                    <?php endforeach; ?>
    
                                </tr>
                            </table> -->
                        </div>
                    </div>




                </div>
            </div>

        </div>
    <?php endforeach; ?>

    <!-- 分頁 -->
    <div class="py-2">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item<?php
                                        if ($i == $p) echo " active"; ?>"><a class="page-link"
                        href="index.php?current=product-card&p=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

</div>