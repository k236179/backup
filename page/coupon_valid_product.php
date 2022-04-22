<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (isset($_GET["id_type"]) && isset($_GET["id"])) {


    $id_type = $_GET["id_type"];
    $id = $_GET["id"];


    $sql = "SELECT coupon_valid_product. * , 
    product.name AS pro_name ,
    coupon.name, 
    product.price,
    product.inventory ,
    product.createTime 
    FROM product,coupon_valid_product,coupon 
    WHERE coupon.id=coupon_valid_product.coupon_id 
    AND product.id=coupon_valid_product.product_id AND $id_type=$id ";
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

            <div class="col-auto">
                <a class="btn btn-info text-white" href="http://localhost:8080/project/page/index.php?current=coupon_valid_product">重新篩選</a>
            </div>
        </form>




        <div scope="col"><?php
                            $title = "新增適用商品";
                            $formType = "post-couponValidProduct";
                            require("../components/post-offcanvas.php") ?></div>

    </thead>
    <tbody>
        <h3><?= $id_type ?>=<?= $id ?>的商品</h3>

        <div class="row">
            <?php foreach ($rows as $row) : ?>
                <div class="col-3 gy-3">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["pro_name"] ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">製造日期<?= $row["createTime"] ?></li>
                            <li class="list-group-item">庫存: <?= $row["inventory"] ?></li>
                            <li class="list-group-item">價格: <?= $row["price"] ?></li>
                            <li class="list-group-item">Coupon: <?= $row["name"] ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </tbody>
</table>

<?php
$conn->close();
?>