<?php
require("../project-conn.php");

if(!isset($_GET["p"])){
    $p=1;
}else{
    $p=$_GET["p"];
}

$per_page=4;
$start=($p-1)*$per_page;
$user=$_GET["user"];

if($user!=""){
    $sql="SELECT * FROM order_info WHERE user = '$user' LIMIT $start,$per_page ";
    $pageSql="SELECT *FROM order_info WHERE user = '$user' ";
}else{
    $sql="SELECT * FROM order_info LIMIT $start,$per_page ";
    $pageSql="SELECT *FROM order_info ";
}

//$sql = "SELECT * FROM order_info LIMIT $start,$per_page";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);


//$sql = "SELECT *FROM order_info";
$result = $conn->query($pageSql);
$total = $result->num_rows;
$page_count = CEIL($total/$per_page);



// if($rows>0){
//     foreach($rows as $row){
//         var_dump($row);
//     }
// }
?>

<div class="d-flex justify-content-between">
<h2>訂單一覽</h2>
<nav aria-label="Page navigation example">
  <ul class="pagination">
   
  <?php for($i=1; $i<=$page_count;$i++): ?>
            <li class="page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-info&p=<?=$i?>&user=<?=$user?>"><?=$i?></a></li>
            <?php endfor; ?>
          
    
  </ul>
</nav>

<div>共<?=$total?>筆資料，<?=$page_count?>頁</div>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th> 
            <th scope="col">USER</th>
           
            <th scope="col">CREATE TIME</th>
            <th scope="col">DELIVERY</th>
            <th scope="col">RECEIPENT</th>
            <th scope="col">PAY</th>
            <th scope="col">STATUS</th>
            <th scope="col">VALID</th>
            <th scope="col">DEADLINE</th>
            <th scope="col">COUPON</th>
            <th scope="col"><?php
                            $title = "新增訂單";
                            $formType = "post-order-info";
                            require_once("../components/post-offcanvas.php") ?></th>
                            <th> <a href="../page/index.php?current=order-info&user=" class="btn btn-secondary">回列表</a></th>
        </tr>
    </thead>
    <tbody>
        
        <?php if ($rows > 0) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <?php $userId=$row['user'] ?>
                    <td><?= $row["id"] ?></td>
                    <td> <a href="../page/index.php?current=order-info&user=<?= $userId ?>"> <?= $row["user"] ?></a></td>
                    <td><?= $row["create_time"] ?></td>
                    <td><?= $row["delivery"] ?></td>
                    <td><?= $row["receipent"] ?></td>
                    <td><?= $row["pay"] ?></td>
                    <td><?= $row["status"] ?></td>
                    <td><?= $row["valid"] ?></td>
                    <td><?= $row["deadline"] ?></td>
                    <td> <a href="#"> <?= $row["coupon"] ?></a></td>
                    <td><a class="btn btn-danger me-2" href="../components/delete_order_info.php?id=<?=$row["id"]?>">刪除</a></td>
                    <td><a class="btn btn-secondary me-2" href="../components/edit_order_info.php?id=<?=$row["id"]?>">編輯</a></td>
                </tr>
                
                <tr>
                    
                    <th scope="col">ADDRESS</th>
                    <td><?= $row["address"] ?></td>
                    <!-- <td> <input class="form-control" name="memo" value="" type="text"></td> -->
                    
                    </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>



    </tbody>
</table>



</form>