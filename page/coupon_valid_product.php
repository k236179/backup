<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
$sql = "SELECT * FROM coupon_valid_product ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);


//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候
// $sql = "SELECT * FROM product ";
// $result = $conn->query($sql);
// $productRows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- 清單 -->
<h2>優惠券適用課程</h2>
<table class="table">
    <thead>
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
            <td><?= $row["coupon_id"] ?></td>
            <?php endforeach; ?>
    </tbody>
</table>

<?php
$conn->close();
?>