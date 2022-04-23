<?php
require("../project-conn.php");

$sql="SELECT order_info.*, user.name FROM order_info, user WHERE order_info.user=user.id";

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

?>

<div class="row">
    <hr>
    <h3>訂單方塊</h3>

    <?php foreach($rows as $row): ?>
    <div class="card m-3" style="max-width: 540px">
        <div class="row g-0 align-items-center">
            <div class="col-md-4 ">
                <img src="../img/icon/received.png" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>訂單 # <?=$row["id"]?></strong></h5>
                    <p class="card-text mb-0"><span><strong>下單人 : </strong></span><?=$row["name"]?></p>
                    <p class="card-text mb-0"><span><strong>收件人 : </strong></span><?=$row["receipent"]?></p>
                    <p class="card-text mb-0"><span><strong>貨運方式 : </strong></span><?=$row["delivery"]?></p>
                    <p class="card-text mb-0"><span><strong>付款方式 : </strong></span><?=$row["pay"]?></p>
                    <p class="card-text mb-0"><span><strong>處理進度 : </strong></span><?=$row["status"]?></p>
                    <p class="card-text mb-0"><span><strong>地址:</strong></span></p>
                    <p><?=$row["address"]?></p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary">編輯</button>
                    <button type="button" class="btn btn-outline-primary">刪除</button>
                    <button type="button" class="btn btn-outline-primary">問題</button>
                </div>
                <p class="text-center m-2"><small class="text-muted">下單時間 : <?=$row["create_time"]?></small></p>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
   