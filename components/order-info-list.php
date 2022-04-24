<?php
require("../project-conn.php");

if(isset($_GET["id"])){
    
    $id = $_GET["id"];

    $sql = " SELECT order_info.*, user.* ,  product.name AS product_name
    FROM order_info, user , order_item, product
    WHERE order_info.user=user.id 
    AND order_item.order_info = order_info.id
    AND product.id = order_item.product
    AND `order_info`.`id`=$id ";
    
}else{
   
    echo "網頁錯誤";
}

$sql = " SELECT order_info.*, user.* ,  product.name AS product_name
    FROM order_info, user , order_item, product
    WHERE order_info.user=user.id 
    AND order_item.order_info = order_info.id
    AND product.id = order_item.product
    AND `order_info`.`id`=$id ";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rows_num = $result->num_rows;


?>

<!doctype html>
<html lang="en">
  <head>
    <title>order info list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

    
      

      <!--id_type=order_info-->
      

      <div class="card m-3" style="max-width: 540px">
        <div class="row g-0 align-items-center">
            <div class="col-md-4 ">
                <img src="../img/icon/received.png" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>訂單 # <?=$rows[0]["id"]?></strong></h5>

                     <?php foreach($rows as $row): ?>
                    <p class="card-text mb-0"><span><strong>商品名 : </strong></span> <span><?=$row["product_name"]?></span></p>
                    <?php endforeach; ?>

                </div>
            </div>
          

        </div>
    </div>


    <div class="card m-3" style="max-width: 540px">

    <a class="btn btn-secondary text-decoration-none text-white" href="../page/index.php?current=order-info&user=">返回列表</a>
        <!-- <button class="btn btn-secondary w-"><a class="text-decoration-none text-white" href="../page/index.php?current=order-info&user=">返回列表</a></button> -->
    </div>
          
           
        
       
      

         
      
    </body>
</html>

