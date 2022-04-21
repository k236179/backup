<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
if (isset($_GET["id_type"]) && isset($_GET["id"])) {
    $id_type = $_GET["id_type"];
    $id = $_GET["id"];
    $sql = "SELECT * FROM coupon_valid_product WHERE $id_type=$id";
    $title = "<h3>本次搜索條件 : $id_type=$id</h3>";
} else {
    $sql = "SELECT * FROM coupon_valid_product";
    $title = "";
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
                <option value="product_id">商品 ID</option>
                <option value="coupon_id">Coupon ID</option>
            </select>
            <div class="col-auto">
                <input type="number" class="form-control" name="id" value="<?= $id ?>">
            </div>
            <input class="d-none" type="text" name="current" value="coupon_valid_product">
            <div class="col-auto">
                <button type="submit" class="btn btn-info text-white">篩選</button>
            </div>

            <div class="col-auto">
                <a class="btn btn-info text-white" href="http://localhost:8080/project/page/index.php?current=coupon_valid_product">重新篩選</a>
            </div>
        </form>

        <?php echo $title ?>
        <tr>
            <th scope="col">id</th>
            <th scope="col">product id</th>
            <th scope="col">coupon id</th>
            <th scope="col"><?php
                            $title = "新增適用商品";
                            $formType = "post-couponValidProduct";
                            require("../components/post-offcanvas.php") ?></th>
        </tr>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["product_id"] ?></td>
                <td><?= $row["coupon_id"] ?></td>

            <?php endforeach; ?>
    </tbody>
</table>

<?php
$conn->close();
?>