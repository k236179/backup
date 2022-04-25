<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
if (!isset($_GET["p"])) {
     $p = 1;
} else {
     $p = $_GET["p"];
}

$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
$total = $result->num_rows;

$per_page = 4;
$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM user  LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$page_count = CEIL($total / $per_page);


?>
<style>
     .user_img{
          width: 10rem;
          border
     }
</style>

<h3>會員一覽(方塊)</h3>
<div class="row">
     <?php foreach ($rows as $row) : ?>
          <div class="card m-3" style="max-width: 540px">
               <div class="row g-0 align-items-center">
                    <div class="col-md-4 ">
                         <img class="user_img rounded border border-3" src="../img/user/<?=$row["photo"]?>" alt="">
                    </div>
                    <div class="col-md-8">                         
                         <div class="card-body">
                              <h5 class="card-title"><strong>User# <?= $row["id"] ?></strong></h5>
                              <p class="card-text mb-0"><span><strong>姓名 :</strong></span><?= $row["name"] ?></p>
                              <p class="card-text mb-0"><span><strong>帳號 : </strong></span><?= $row["account"] ?></p>
                              <p class="card-text mb-0"><span><strong>電話 : </strong></span><?= $row["phone"] ?></p>
                              <p class="card-text mb-0"><span><strong>啟用:</strong></span><?= $row["valid"] ?></p>
                         </div>
                    </div>
                    <div class="row">
                         <div class="btn-group  mb-1" role="group" aria-label="Basic outlined example">
                              <button type="button" class="btn btn-outline-primary" ><a href="http://localhost:8080/project/page/index.php?id_type=user&id=<?= $row["id"] ?>&current=order-item-filter">訂單</a></button>
                              <button type="button" class="btn btn-outline-primary"><a href="http://localhost:8080/project/page/index.php?current=user-favorite2&id_type=user&id=<?= $row["id"] ?>">收藏</a></button>
                         </div>
                    </div>
                    <div class="row">
                         <div class="btn-group  mb-3" role="group" aria-label="Basic outlined example">
                              <button type="button" class="btn btn-outline-primary"><a href="http://localhost:8080/project/components/edit-user.php?id=<?= $row["id"] ?>">變更</a> </button>
                              <button type="button" class="btn btn-outline-primary"><a href="http://localhost:8080/project/components/delete-user.php?id=<?= $row["id"] ?>">刪除</a></button>
                         </div>
                    <p class="text-center m-2"><small class="text-muted">建立時間 : 2022/04/20/18/0</small></p>
                    </div>
               </div>
          </div>
     <?php endforeach; ?>
     <nav aria-label="Page navigation example">
          <ul class="pagination">
               <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="index.php?current=user-card&p=<?= $i ?>"><?= $i ?></a></li>
               <?php endfor ?>
          </ul>

          <div class="py-2 text-end">
               第<?= $p ?> 頁 , 共<?= $page_count ?>頁 , 共<?= $total ?> 筆資料
          </div>
     </nav>
</div>