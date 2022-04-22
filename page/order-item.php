<?php
require("../project-conn.php");

if(!isset($_GET["p"])){
    $p=1;
}else{
    $p=$_GET["p"];
}

if(!isset($_GET["search_info"])){
    $searchId='';

}else{
    $searchId=$_GET["search_info"];
}


$per_page=4;
$start=($p-1)*$per_page;
$info=$_GET["order_info"];

if($info!=""){
    $sql="SELECT * FROM order_item WHERE order_info = '$info' LIMIT $start,$per_page";
    $pageSql="SELECT * FROM order_item WHERE order_info = '$info'";
}else{
    $sql = "SELECT * FROM order_item LIMIT $start,$per_page";
    $pageSql="SELECT * FROM order_item ";
}

// $sql = "SELECT * FROM order_item LIMIT $start,$per_page";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// $sql = "SELECT *FROM order_item";
$result = $conn->query($pageSql);
$total = $result->num_rows;
$page_count = CEIL($total/$per_page);     



if($searchId!=''){
    $joinSql="SELECT * FROM order_info, order_item WHERE order_info.id = order_item.order_info AND `order_info`.`id` = '$searchId' LIMIT $start,$per_page";
}else{$joinSql="SELECT * FROM order_info, order_item WHERE order_info.id = order_item.order_info LIMIT $start,$per_page";}
$result= $conn->query($joinSql);
$joinTotal=$result->num_rows;
$joinRows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($joinTotal);
// var_dump($joinRows);




?>
<!-- 清單 -->

<div class="d-flex justify-content-between">
        <h2>訂單物品</h2>

       
        <form class="" action="./index.php"> 
            <label for="">搜尋詳細資料</label>
            <input type="number" value="" name="search_info" placeholder="請輸入ID">
            <!-- http://localhost:8080/project/page/index.php? -->
            <input type="text" value="order-item" name="current" type="hidden" class="d-none">
            <input type="text" value="" name="order_info" type="hidden" class="d-none">
            <button type="submit" class="btn btn-secondary">GO</button>
        </form>

        <nav aria-label="Page navigation example">
        <ul class="pagination">
            
            <?php for($i=1; $i<=$page_count;$i++): ?>
            <li class="page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-item&p=<?=$i?>&order_info=<?= $info ?>"><?=$i?></a></li>
            <?php endfor; ?>
            </li>
        </ul>
        
        </nav>

       
    <div>共<?=$total?>筆資料，<?=$page_count?>頁</div>
</div>

<?php if($searchId==''): ?>
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
                            <th><a href="../page/index.php?current=order-item&order_info=" class="btn btn-secondary">回列表</a></th> 
        </tr>
    </thead>
    <tbody>
        <?php if ($joinRows > 0) : ?>
        <?php foreach ($joinRows as $row) : ?>
        <tr>
            <?php $infoId=$row["order_info"] ?>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["product"] ?></td>
            <td> <a href="../page/index.php?current=order-item&order_info=<?= $infoId ?>"><?= $row["order_info"] ?></a> </td>
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


<?php else: ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">USER</th>
            <th scope="col">COUPON</th>
            <th scope="col">CREATE TIME</th>
            <th scope="col">DELIVERY</th>
            <th scope="col">RECEIPENT</th>
            <th scope="col">PAY</th>
            <th scope="col">STATUS</th>
            <th scope="col">VALID</th>
            <th scope="col">DEADLINE</th>
            <th scope="col">ADDRESS</th>


            <th scope="col"><?php
                            $title = "新增訂單商品";
                            $formType = "post-order-item";
                            require_once("../components/post-offcanvas.php") ?></th>
                            <th><a href="../page/index.php?current=order-item&order_info=" class="btn btn-secondary">回列表</a></th> 
        </tr>
    </thead>
    <tbody>
        <?php if ($joinRows > 0) : ?>
        <?php foreach ($joinRows as $row) : ?>
        <tr>
           
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["user"] ?></td>
            <td> <?= $row["coupon"] ?></a> </td>
            <td><?= $row["create_time"] ?></td>
            <td><?= $row["delivery"] ?></td>
            <td><?= $row["receipent"] ?></td>
            <td><?= $row["pay"] ?></td>
            <td><?= $row["status"] ?></td>
            <td><?= $row["valid"] ?></td>
            <td><?= $row["deadline"] ?></td>
            <td><?= $row["address"] ?></td>
            <td><a class="btn btn-secondary" href="../components/edit_order_item.php?id=<?= $row["id"] ?>">編輯</a> </td>
            <td><a class="btn btn-danger" href="../components/delete_order_item.php?id=<?= $row["id"] ?>" >刪除</a> </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>
<?php endif; ?>


<?php
$conn->close();
?>