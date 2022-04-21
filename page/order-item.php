<?php
require("../project-conn.php");

$sql = "SELECT * FROM order_item";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!-- 清單 -->
<h2>訂單物品</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">ORDER INFORMATION</th>
            <th scope="col">CLASS</th>
            <th scope="col">AMOUNT</th>
            <th scope="col">MEMO</th>
            <th scope="col"><?php
                            $title = "新增訂單商品";
                            $formType = "post-order-item";
                            require_once("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows > 0) : ?>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["product"] ?></td>
            <td><?= $row["order_info"] ?></td>
            <td><?= $row["class"] ?></td>
            <td><?= $row["counter"] ?></td>
            <td><?= $row["memo"] ?></td>
            <td><a class="btn btn-secondary" href="order_item_edit.php?id=<?= $row["id"] ?>">編輯</a> </td>
            <td><button class="btn btn-danger" type="submit">刪除</button> </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>


<?php
$conn->close();
?>