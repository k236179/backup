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
    coupon.limited,
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
    product.price,
    product.inventory ,
    product.createTime 
    FROM product,coupon_valid_product,coupon 
    WHERE coupon.id=coupon_valid_product.coupon_id 
    AND product.id=coupon_valid_product.product_id AND $id_type=$id ";
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
<h2>為什麼couponid 超過10就會顯示錯誤，10以內就不會</h2>
<table class="table">
    <thead>
        <form action="../page/index.php">
            <select name="id_type" class="form-select" aria-label="Default select example">
                <option value="product_id" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "product_id") {
                                                echo "selected";
                                            } ?>>商品 ID</option>
                <option value="coupon_id" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "coupon_id") {
                                                echo "selected";
                                            } ?>>Coupon ID</option>
                <!-- 可以使用迴圈的寫法 -->

            </select>
            <div class="col-auto">
                <input type="number" class="form-control" name="id" value="<?= $id ?>">
            </div>
            <div class="col-auto">
                <input type="text" class="d-none" value="coupon_valid_product" name="current">
                <!-- 如果沒有這個，網頁會get不到東西 -->
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-info text-white">篩選</button>
            </div>


        </form>




        <div scope="col"><?php
                            $title = "新增適用商品";
                            $formType = "post-couponValidProduct";
                            require("../components/post-offcanvas.php") ?></div>

    </thead>
    <?php if (($_GET["id_type"] == "product_id")) : ?>


        <h3><?= $id_type ?>=<?= $id ?><?= $rows[0]["pro_name"] ?></h3>
        <div class="row">
            <h5 class="card-title"></h5>
            <div class="col-3 gy-3">
                <div class="card ">
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">製造日期<?= $rows[0]["createTime"] ?></li>
                            <li class="list-group-item">庫存: <?= $rows[0]["inventory"] ?></li>
                            <li class="list-group-item">價格: <?= $rows[0]["price"] ?></li>
                            <?php foreach ($rows as $row) : ?>
                                <li class="list-group-item">Coupon: <?= $row["name"] ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>

            <?php else : ?>

                <h3><?= $rows[00]["name"] ?></h3>
                <div class="row">
                    <h5 class="card-title"></h5>
                    <div class="col-3 gy-3">
                        <div class="card ">
                            <div class="card-body">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">折扣<?= $rows[0]["discount"] ?></li>
                                    <li class="list-group-item">使用期限: <?= $rows[0]["expiry"] ?></li>
                                    <li class="list-group-item">使用次數: <?= $rows[0]["limited"] ?></li>
                                    <?php foreach ($rows as $row) : ?>
                                        <li class="list-group-item">商品名稱: <?= $row["pro_name"] ?></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div>

                    <?php endif; ?>

</table>
<div class="col-auto">
    <a class="btn btn-info text-white" href="http://localhost:8080/project/page/index.php?id_type=product_id&id=1&current=coupon_valid_product">重新篩選</a>
</div>

<?php
$conn->close();
?>