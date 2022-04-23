<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require("../project-conn.php");


$sql = "SELECT * FROM product WHERE valid = 1";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!-- 清單 -->
<h2>商品一覽 test</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">名稱</th>
            <th scope="col">價格</th>
            <th scope="col" class="text-nowrap">配送方式</th>
            <th scope="col" class="text-nowrap">庫存</th>
            <th scope="col" class="text-nowrap">上/下架</th>
            <th scope="col">產品說明</th>
            <th scope="col"><?php
                            $title = "新增商品";
                            $formType = "post-product";
                            require_once("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["name"] ?></td>
            <td class="text-end"><?= $row["price"] ?></td>
            <td class="text-end"><?= $row["express"] ?></td>
            <td class="text-end"><?= $row["inventory"] ?></td>
            <td class="text-end"><?= $row["launched"] ?></td>
            <td><?= $row["description"] ?></td>
            <!-- <td><//?=$row["images"]?></td> -->
            <td class="text-nowrap"><a href="edit_form.php?id=<?= $row["id"] ?>" class="btn btn-secondary">編輯</a>
            </td>
            <td class="text-nowrap"><a href="deleteListById.php?id=<?= $row["id"] ?>" class="btn btn-danger">刪除</a>
            </td>
            <td class="text-nowrap"><a href="" class="btn btn-secondary">預留</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>