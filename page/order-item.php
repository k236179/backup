<?php
require("../project-conn.php");

if(!isset($_GET["p"])){
    $p=1;
}else{
    $p=$_GET["p"];
}

$per_page=4;
$start=($p-1)*$per_page;


$sql = "SELECT * FROM order_item LIMIT $start,$per_page";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT *FROM order_item";
$result = $conn->query($sql);
$total = $result->num_rows;
$page_count = CEIL($total/$per_page);


?>
<!-- 清單 -->

<div class="d-flex justify-content-between">
        <h2>訂單物品</h2>

        <nav aria-label="Page navigation example">
        <ul class="pagination">
            
            <?php for($i=1; $i<=$page_count;$i++): ?>
            <li class="page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-item&p=<?=$i?>"><?=$i?></a></li>
            <?php endfor; ?>
            </li>
        </ul>
        
        </nav>
    <div>共<?=$total?>筆資料，<?=$page_count?>頁</div>
</div>
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
            <td><a class="btn btn-secondary" href="../components/edit_order_item.php?id=<?= $row["id"] ?>">編輯</a> </td>
            <td><a class="btn btn-danger" href="../components/delete_order_item.php?id=<?= $row["id"] ?>" >刪除</a> </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>


<?php
$conn->close();
?>