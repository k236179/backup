<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (isset($_GET["id_type"]) && isset($_GET["id"])) {


    $id_type = $_GET["id_type"];
    $id = $_GET["id"];


    $sql = "SELECT coupon_valid_product. * , 
    -- 以什麼資料夾為基準↑
    product.name AS pro_name ,
    -- 因為coupon 與 product 兩個檔案有相同的name所以我設定product的name 變更為 pro_name
    coupon.name, 
    coupon.discount,
    coupon.expiry,
    coupon.code, 
    coupon.limited,
    coupon.valid, 
    product.price,
    product.inventory ,
    product.createTime 
    -- 以上四個是從coupon 與 product 裡個檔案中我要拿出來加入coupon_valid_product的資料
    FROM product,coupon_valid_product,coupon 
    -- 我要關聯的資料
    WHERE coupon.id=coupon_valid_product.coupon_id 
    AND product.id=coupon_valid_product.product_id 
    -- 將這些資料合併的基準是什麼以上面的方式呈現
    AND $id_type=$id ";
} else {

    $id_type = "product_id";
    $id = 1;
    $sql = "SELECT coupon_valid_product. * , 
    product.name AS pro_name ,
    coupon.name, 
    coupon.discount,
    coupon.expiry,
    coupon.code, 
    coupon.limited,
    coupon.valid, 
    product.price,
    product.inventory ,
    product.createTime 
    FROM product,coupon_valid_product,coupon 
    WHERE coupon.id=coupon_valid_product.coupon_id 
    AND product.id=coupon_valid_product.product_id  ";
}



$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);




//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候
// $sql = "SELECT * FROM product ";
// $result = $conn->query($sql);
// $productRows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- 清單 -->
<h2>優惠券適用商品</h2>
<table class="table">
    <thead>
        <form action="../page/index.php">
            <!-- 功能為導去哪一個網址 -->
            <div class="row ">
                <select name="id_type" class="form-select mb-3  col " aria-label="Default select example">
                    <option value="product_id" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "product_id") {
                                                    echo "selected";
                                                } ?>>商品 ID</option>
                    <option value="coupon_id" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "coupon_id") {
                                                    echo "selected";
                                                } ?>>Coupon ID</option>
                    <!-- 可以使用迴圈的寫法 -->
                </select>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID : </span>
                        <input type="number" class="form-control" name="id" value="<?= $id ?>">
                    </div>
                </div>

                <div class="col-auto">
                    <input type="text" class="d-none" value="coupon_valid_product" name="current">
                    <!-- 如果沒有這個，網頁會get不到東西 -->
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-info text-white">篩選</button>
                </div>

                <div class="col" scope="col"><?php
                                                $title = "新增適用商品";
                                                $formType = "post-couponValidProduct";
                                                require("../components/post-offcanvas.php") ?></div>
            </div>
        </form>





    </thead>
    <?php if (($id_type == "product_id")) : ?>
        <!-- 如果是以商品篩選的話要做以下動作 -->
        <ul class="list-group list-group-flush">
            <li class="fw-bolder list-group-item ">商品名稱: <?= $rows[0]["pro_name"] ?></li>
            <li class="fw-bolder list-group-item ">製造日期: <?= $rows[0]["createTime"] ?></li>
            <li class="fw-bolder list-group-item ">庫存: <?= $rows[0]["inventory"] ?></li>
            <li class="fw-bolder list-group-item ">價格: <?= $rows[0]["price"] ?></li>
        </ul>
        <div class="row col">
            <h5 class="card-title"></h5>
            <div class=" row">
                <?php foreach ($rows as $row) : ?>
                    <div class="card m-3" style="max-width: 500px">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 ">
                                <img src="../img/icon/coupon.png" class="img-fluid rounded-start" alt="..." />
                            </div>
                            <div class="col-md-8">

                                <div class="card-body">
                                    <h5 class="card-title"><strong>Coupon# <?= $row["id"] ?></strong></h5>
                                    <p class="card-text mb-0"><span><strong>優惠券 :</strong></span><?= $row["name"] ?></p>
                                    <p class="card-text mb-0"><span><strong>序號 : </strong></span><?= $row["code"] ?></p>
                                    <p class="card-text mb-0"><span><strong>折扣% : </strong></span><?= $row["discount"] ?></p>
                                    <p class="card-text mb-0"><span><strong>使用期限 : </strong></span></p>
                                    <p><?= $row["expiry"] ?></p>
                                    <p class="card-text mb-0"><span><strong>使用次數 : </strong></span><?= $row["limited"] ?></p>
                                    <p class="card-text mb-0"><span><strong>啟用:</strong></span><?= $row["valid"] ?></p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="http://localhost:8080/project/api/coupon/備用/form-post-edit.php?id=<?= $row["id"] ?>">編輯</a></button>
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="http://localhost:8080/project/api/coupon/備用/form-post-delete.php?id=<?= $row["id"] ?>">刪除</a></button>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>





            <?php else : ?>
                <h3><?= $rows[0]["name"] ?></h3>
                <ul class="list-group list-group-flush">
                    <li class="fw-bolder list-group-item">折扣<?= $rows[0]["discount"] ?></li>
                    <li class="fw-bolder list-group-item">使用期限: <?= $rows[0]["expiry"] ?></li>
                    <li class="fw-bolder list-group-item">使用次數: <?= $rows[0]["limited"] ?></li>
                </ul>
                <h3>商品類型</h3>
                <div class="row col">
                    <div class=" row">
                        <?php foreach ($rows as $row) : ?>
                            <div class="card m-4" style="width: 18rem;">
                                <img class="card-img-top" src="../img/icon/barcode.png" alt="Card image cap">

                                <li class="">商品名稱: </li>
                                <li class="list-group-item m-3"><?= $row["pro_name"] ?></li>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
        </div>
        </div>
    <?php endif; ?>

</table>
<!-- <div class="col-auto">
    <a class="btn btn-info text-white" href="http://localhost:8080/project/page/index.php?id_type=product_id&id=1&current=coupon_valid_product">重新篩選</a>
</div> -->

<?php
$conn->close();
?>