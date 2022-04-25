<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (isset($_GET["id_type"]) && isset($_GET["id"])) {
    $id_type = $_GET["id_type"];
    $id = $_GET["id"];}else{
        echo "請輸入條件";
        exit;
    }
 if($id_type=="user"){
    $sql="SELECT user_favorite.*, 
    user.photo,
    user.name AS userName, 
    user.account,
    user.phone,
    user.valid AS userValid,
    product.name AS productName,
    lessons.name AS className
    FROM user_favorite,user,product,lessons
    WHERE user_favorite.user_id=user.id
    AND product.id = user_favorite.product_id
    AND $id_type.id=$id";
 }elseif($id_type=="product_id"){
    $sql="SELECT user_favorite.*,
     product.name AS productName,
     product.price,
     product.inventory,
     product.description,
     user.photo,
     user.name AS userName, 
     user.account,
     user.phone,
     user.valid AS userValid
    FROM user_favorite,user,product
    WHERE product.id = user_favorite.product_id
    AND user_favorite.user_id=user.id
    AND $id_type=$id";
 };
    

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowsLength = $result->num_rows;

?>

<!-- 清單 -->
<h2>會員收藏</h2>
<table class="table">
    <thead>
        <form action="../page/index.php">
            <!-- 功能為導去哪一個網址 -->
            <div class="row ">
                <select name="id_type" class="form-select mb-3  col " aria-label="Default select example">
                    <option value="user" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "user_id") {
                                                    echo "selected";
                                                } ?>>會員 ID</option>
                <option value="product_id" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "product_id") {
                                                    echo "selected";
                                                } ?>>商品 ID</option>
                </select>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID : </span>
                        <input type="number" class="form-control" name="id" value="<?= $id ?>">
                    </div>
                </div>

                <div class="col-auto">
                    <input type="text" class="d-none" value="user-favorite2" name="current">
                    <!-- 如果沒有這個，網頁會get不到東西 -->
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-info text-white">篩選</button>
                </div>
            </div>
        </form>

    </thead>
    <?php if ($rowsLength==0) : ?>
        <p><?=$id_type?> # <?=$id?>尚無收藏</p>
        <?php exit;?>
    <?php endif; ?>
   
    <?php if ($id_type == "user") : ?>
        <!-- 如果是以商品篩選的話要做以下動作 -->
        <div class="row">
            <div class="col-3">
                <img class="w-100" src="../img/user/<?=$rows[0]["photo"]?>" alt="">
            </div>
            <div class="col">
                <ul class="list-group list-group-flush">
                    <li class="fw-bolder list-group-item ">姓名: <?= $rows[0]["userName"] ?></li>
                    <li class="fw-bolder list-group-item ">帳號: <?= $rows[0]["account"] ?></li>
                    <li class="fw-bolder list-group-item ">電話: <?= $rows[0]["phone"] ?></li>
                    <li class="fw-bolder list-group-item ">啟用: <?= $rows[0]["userValid"] ?></li>
                </ul>
           </div>
        </div>        

            <h5 class="card-title"></h5>
            <div class=" row">
                <?php foreach ($rows as $row) : ?>    
                    <div class="card m-3" style="max-width: 500px">
                        <div class="row g-0 align-items-center">
                        <div class="col ">
                            <img class="w-100" src="../img/product/<?=$row["productName"]?>.jpg" alt="">
                        </div>  
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text mb-0"><span><strong>產品 :</strong></span><?= $row["productName"] ?></p>
                                    <p class="card-text mb-0"><span><strong>課程 : </strong></span><?= $row["className"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        
    <?php else : ?>
            <div class="row">
                    <div class="col-3">
                     <img class="w-100" src="../img/product/<?=$rows[0]["productName"]?>.jpg" alt="">
                    </div>
                <div class="col">
                    <ul class="list-group list-group-flush">
                     <li class="fw-bolder list-group-item ">商品名稱: <?= $rows[0]["productName"] ?></li>
                     <li class="fw-bolder list-group-item ">產品說明: <?= $rows[0]["description"] ?></li>
                    <li class="fw-bolder list-group-item ">價錢: <?= $rows[0]["price"] ?></li>
                    <li class="fw-bolder list-group-item ">庫存: <?= $rows[0]["inventory"] ?></li>
                    </ul>
            </div>
            <h5 class="card-title"></h5>
            <div class=" row">
                <?php foreach ($rows as $row) : ?>    
                    <div class="card m-3" style="max-width: 500px">
                        <div class="row g-0 align-items-center">
                        <div class="col ">
                            <img class="w-100" src="../img/user/<?=$row["photo"]?>" alt="">
                        </div>  
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text mb-0"><span><strong>姓名 :</strong></span><?= $row["userName"] ?></p>
                                    <p class="card-text mb-0"><span><strong>帳號 : </strong></span><?= $row["account"] ?></p>
                                    <p class="card-text mb-0"><span><strong>電話 : </strong></span><?= $row["phone"] ?></p>
                                    <p class="card-text mb-0"><span><strong>啟用: </strong></span><?= $row["userValid"] ?></p>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

    <?php endif; ?>

</table>
<!-- <div class="col-auto">
    <a class="btn btn-info text-white" href="http://localhost:8080/project/page/index.php?id_type=product_id&id=1&current=coupon_valid_product">重新篩選</a>
</div> -->

<?php
$conn->close();
?>