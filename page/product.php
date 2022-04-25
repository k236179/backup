<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require("../project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}


$sql = "SELECT * FROM product WHERE valid = 1";

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

$expressList = array("無法配送", "常溫配送", "低溫配送");
$launchedList = array("NO", "YES");
?>


<!-- 清單 -->
<h2>商品一覽</h2>

<div class="py-2 text-end">
    第 <?= $p ?> 頁,共 <?= $page_count ?> 頁,共 <?= $total ?> 筆
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">名稱</th>
            <th scope="col">價格</th>
            <th scope="col" class="text-nowrap">配送方式</th>
            <th scope="col" class="text-nowrap">庫存</th>
            <th scope="col" class="text-nowrap">上/下架</th>
            <th scope="col"><?php
                            $title = "新增商品";
                            $formType = "post-product";
                            require_once("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td># <?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><?= $expressList[$row["express"]] ?></td>
            <td><?= $row["inventory"] ?></td>
            <td><?= $launchedList[$row["launched"]] ?></td>
        </tr>
        <tr>
            <td class="text-center"><img style="width: 1.5rem;" src="../img/icon/sticky-notes.png" alt=""></td>
            <td colspan="3">
                <span class="text-muted"><small><?= $row["description"] ?></small></span>
            </td>
            <td colspan="3" class="text-center">
                <button type="button" class="btn-sm btn-success">詳細</button>
                <?php
                    $edit_type = "edit-product";
                    require("../components/edit-modal.php") ?>
                <button type="button" class="btn-sm btn-danger"><a href="../api/product/delete.php?id=<?= $row["id"] ?>"
                        class="btn-sm btn-danger">刪除</a></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- 分頁 -->
<div class="py-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
            <li class="page-item<?php
                                    if ($i == $p) echo " active"; ?>"><a class="page-link"
                    href="index.php?current=product&p=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>