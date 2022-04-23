<?php
require("../project-conn.php");

if(isset($_GET["id_type"]) && isset($_GET["id"])){
    $id_type = $_GET["id_type"];
    $id = $_GET["id"];

    $sql = " SELECT order_info.*, user.* ,  product.name AS product_name
    FROM order_info, user , order_item, product
    WHERE order_info.user=user.id 
    AND order_item.order_info = order_info.id
    AND product.id = order_item.product
    AND `$id_type`.`id`=$id ";
    
}else{
   
    $sql = "SELECT order_info.*, user.name 
    FROM order_info, user 
    WHERE order_info.user=user.id";
}

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rows_num = $result->num_rows;


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

      <form action="../page/index.php">
          <div class="mb-2">
              <select name="id_type" id="id_type">
              <option value="user">使用者ID</option>
              <option value="order_info">訂單ID</option>
              </select>
          </div>
      
             <div class="mb-2">
              <input type="text" name="id" placeholder="請輸入ID">
            </div>

            <div class="mb-2">
                <input type="hidden" name="current" value="order-item-filter">
            </div>
            

          <div>
              <button type="submit" class="btn btn-secondary">篩選</button>
          </div>
      </form>

      <?php if($id_type == "order_info"&& $rows_num >0): ?>

      <!--id_type=order_info-->
      

      <div class="card m-3" style="max-width: 540px">
        <div class="row g-0 align-items-center">
            <div class="col-md-4 ">
                <img src="../img/icon/received.png" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>訂單 # <?=$rows[0]["id"]?></strong></h5>
                    <p class="card-text mb-0"><span><strong>下單人 : </strong></span><?=$rows[0]["name"]?></p>
                    <p class="card-text mb-0"><span><strong>收件人 : </strong></span><?=$rows[0]["receipent"]?></p>
                    <p class="card-text mb-0"><span><strong>貨運方式 : </strong></span><?=$rows[0]["delivery"]?></p>
                    <p class="card-text mb-0"><span><strong>付款方式 : </strong></span><?=$rows[0]["pay"]?></p>
                    <p class="card-text mb-0"><span><strong>處理進度 : </strong></span><?=$rows[0]["status"]?></p>
                    <p class="card-text mb-0"><span><strong>地址:</strong></span></p>
                    <p><?=$rows[0]["address"]?></p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary">編輯</button>
                    <button type="button" class="btn btn-outline-primary">刪除</button>
                    <button type="button" class="btn btn-outline-primary">問題</button>
                </div>
                <p class="text-center m-2"><small class="text-muted">下單時間 : <?=$rows[0]["create_time"]?></small></p>
            </div>
        </div>
    </div>
           <?php foreach($rows as $row): ?>
            <span><?=$row["product_name"]?></span>
        <?php endforeach; ?>
        <?php endif; ?>
         <!--id_type=user_id-->
      
<?php if($id_type == "user"&& $rows_num >0): ?>
      <div class="card m-3" style="max-width: 540px">
        <div class="row g-0 align-items-center">
            <div class="col-md-4 ">
                <img src="../img/icon/received.png" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>會員 # <?=$rows[0]["id"]?></strong></h5>
                    <p class="card-text mb-0"><span><strong>會員名稱 : </strong></span><?=$rows[0]["name"]?></p>
                    <p class="card-text mb-0"><span><strong>會員電話 : </strong></span><?=$rows[0]["phone"]?></p>
                    <p class="card-text mb-0"><span><strong>會員信箱 : </strong></span><?=$rows[0]["account"]?></p>
                    <p class="card-text mb-0"><span><strong>會員生日 : </strong></span><?=$rows[0]["birthday"]?></p>
                    
                </div>
            </div>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary">編輯</button>
                    <button type="button" class="btn btn-outline-primary">刪除</button>
                    <button type="button" class="btn btn-outline-primary">問題</button>
                </div>
                <p class="text-center m-2"><small class="text-muted">註冊時間 : <?=$rows[0]["createTime"]?></small></p>
            </div>
        </div>
    </div>
           <?php foreach($rows as $row): ?>
            <span>訂單 #<?=$row["id"]?> </span>
        <?php endforeach; ?>
      <?php endif; ?>

     
      
    </body>
</html>

