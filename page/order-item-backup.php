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
    $joinSql="SELECT order_item.counter,order_item.memo , lessons.name, lessons.price, product.name, product.price, order_info.address, order_info.create_time, order_info.receipent,order_info.coupon, user.name, coupon.discount FROM order_item, lessons, product, order_info, user, coupon WHERE order_item.product = product.id AND order_item.class = lessons.id AND order_item.order_info = order_info.id AND order_info.user = user.id AND order_info.coupon = coupon.id AND `order_info`.`id` = '$searchId' ";
}else{$joinSql="SELECT order_item.counter,order_item.memo , lessons.name, lessons.price, product.name, product.price, order_info.address, order_info.create_time, order_info.receipent,order_info.coupon, user.name, coupon.discount FROM order_item, lessons, product, order_info, user, coupon WHERE order_item.product = product.id AND order_item.class = lessons.id AND order_item.order_info = order_info.id AND order_info.user = user.id AND order_info.coupon = coupon.id LIMIT $start,$per_page";}
$result= $conn->query($joinSql);
$joinTotal=$result->num_rows;
$joinRows = $result->fetch_all(MYSQLI_ASSOC);
$join_page_count= CEIL($joinTotal/$per_page);

// var_dump($joinTotal);
// var_dump($joinRows);

// $testsql=" AND `order_info`.`id` = '$searchId'";

// $result= $conn->query($testsql);
// $testTotal=$result->num_rows;
// $testRows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($testTotal);
// var_dump($testRows);

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
            <?php if($searchId==''): ?>
            <?php for($i=1; $i<=$page_count;$i++): ?>
            <li class="page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-item&p=<?=$i?>&order_info=<?= $info ?>"><?=$i?></a></li>
            <?php endfor; ?>
            <?php endif; ?>


            <?php if($searchId!=''): ?>
            <?php for($i=1; $i<=$join_page_count;$i++): ?>
            <li class="d-none page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-item&p=<?=$i?>&order_info=<?= $info ?>&search_info=<?=$searchId?>"><?=$i?></a></li>
            <?php endfor; ?>
            <?php endif; ?>
        </ul>
        
        </nav>

    <?php if($searchId==''): ?>   
    <div>共<?=$total?>筆資料，<?=$page_count?>頁</div>
    <?php endif; ?>

    <?php if($searchId!=''): ?> 
    <div>共<?=$joinTotal?>筆資料</div>
    <?php endif; ?>
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
<!-- card -->
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    
  </div>
  <ul class="list-group list-group-flush">
      <!-- order detail -->
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
  </ul>

  <div class="card-body">
  <!-- order items -->
  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element.
      </div>
    </div>
  
  
</div>
  </div>
</div>
<?php endif; ?>




<?php
$conn->close();
?>