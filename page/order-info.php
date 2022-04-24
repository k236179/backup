<?php
require("../project-conn.php");




if(!isset($_GET["p"])){
    $p=1;
}else{
    $p=$_GET["p"];
}

$per_page=4;
$start=($p-1)*$per_page;

//抓取資料 渲染清單
$sql="SELECT order_info.*, user.name FROM order_info, user WHERE order_info.user=user.id LIMIT $start, $per_page";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);


//抓取資料 用來算頁數
$pageSql="SELECT order_info.*, user.name FROM order_info, user WHERE order_info.user=user.id";
//$sql = "SELECT *FROM order_info";
$result = $conn->query($pageSql);
$total = $result->num_rows;
$page_count = CEIL($total/$per_page);


?>

<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for($i=1; $i<=$page_count;$i++): ?>
                <li class="page-item <?php if($p==$i) echo "active"; ?> "><a class="page-link" href="../page/index.php?current=order-info&p=<?=$i?>"><?=$i?></a></li>
            <?php endfor; ?>
         </ul>
    </nav>
    <div>共<?=$total?>筆資料，<?=$page_count?>頁</div>
</div>

    


<div class="row">
    <table class="table table-striped table-hover my-3">
        <thead>
            <tr>
                <th>編號</th>
                <th><img style="width: 1.5rem;" src="../img/icon/user.png" alt=""> 購買人</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message.png" alt=""> 收件人</th>
                <th><img style="width: 1.5rem;" src="../img/icon/delivery-truck.png" alt=""> 貨運方式</th>
                <th><img style="width: 1.5rem;" src="../img/icon/credit-card.png" alt=""> 付款方式</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt=""> 處理進度</th>
                <th><img style="width: 1.5rem;" src="../img/icon/calendar.png" alt=""> 下單日</th>
            </tr>
        </thead>
        <tbody>
            <!-- 標準欄位 -->
            <?php foreach($rows as $row): ?>
                
                <tr>
                
                <td># <?=$row["id"]?></td>
                <td><?=$row["name"]?></td>
                <td><?=$row["receipent"]?></td>
                <td><?=$row["delivery"]?></td>
                <td><?=$row["pay"]?></td>
                <td><?=$row["status"]?></td>
                <td><?=$row["create_time"]?></td>
            </tr>

            <tr>
                <td class="text-center"><img style="width: 1.5rem;" src="../img/icon/sticky-notes.png" alt=""></td>
                <td colspan="4">
                    <span class="text-muted"><small><?=$row["address"]?></small></span>
                </td>
                <td colspan="2" class="text-center">
                    <button type="button" class="btn-sm btn-success"><a class="text-decoration-none text-white"  href="../components/order-info-list.php?id=<?=$row["id"]?>">商品清單</a>
                        
                    </button>
                    <button type="button" class="btn-sm btn-success"> <a class="text-decoration-none text-white" href="../components/detail-order-info.php?id=<?=$row["id"]?>">詳細</a> </button>
                    <button type="button" class="btn-sm btn-warning"> <a class="text-decoration-none text-white"  href="../components/edit_order_info.php?id=<?=$row["id"]?>">編輯</a> </button>
                    <button type="button" class="btn-sm btn-danger"> <a class="text-white text-decoration-none" href="../components/delete_order_info.php?id=<?=$row["id"]?>">刪除</a> </button>
                </td>
            </tr>
                <?php endforeach; ?>
           
            <!-- 標準欄位 -->

            <!-- <tr>
                <td>#2</td>
                <td>Joe</td>
                <td>John</td>
                <td>mail</td>
                <td>ATM</td>
                <td>received</td>
                <td>2022/04/20/18/0</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" class="text-center">
                    <button type="button" class="btn-sm btn-success">
                        商品清單
                    </button>
                    <button type="button" class="btn-sm btn-success">詳細</button>
                    <button type="button" class="btn-sm btn-warning">編輯</button>
                    <button type="button" class="btn-sm btn-danger">刪除</button>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>
