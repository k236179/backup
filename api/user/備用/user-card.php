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


<h3>會員一覽(方塊)</h3>
<div class="row">
     <?php foreach ($rows as $row) : ?>
          <div class="card m-3" style="max-width: 540px">
               <div class="row g-0 align-items-center">
                    <div class="col-md-4 ">
                        <!-- <img src="../img/user/" class="img-fluid rounded-start" alt="..." /> -->
                    </div>
                    <div class="col-md-8">

                         <div class="card-body">
                              <h5 class="card-title"><strong>User# <?= $row["id"] ?></strong></h5>
                              <p class="card-text mb-0"><span><strong>姓名 :</strong></span><?= $row["name"] ?></p>
                              <p class="card-text mb-0"><span><strong>帳號 : </strong></span><?= $row["account"] ?></p>
                              <p class="card-text mb-0"><span><strong>電話 : </strong></span><?= $row["pchone"] ?></p>
                              <p class="card-text mb-0"><span><strong>啟用:</strong></span><?= $row["valid"] ?></p>
                         </div>
                    </div>
                    <div class="row">
                         <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <button type="button" class="btn btn-outline-primary">
                                   <a href="http://localhost:8080/backend/components/edit-user.php?id=<?= $row["id"] ?>">編輯</a></button>
                              <button type="button" class="btn btn-outline-primary">
                                   <a href="http://localhost:8080/backend/components/delete-user.php?id=<?= $row["id"] ?>">刪除</a></button>

                         </div>

                    </div>
               </div>
          </div>
     <?php endforeach; ?>
     <nav aria-label="Page navigation example">
          <ul class="pagination">
               <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="index.php?current=&p=<?= $i ?>"><?= $i ?></a></li>
               <?php endfor ?>
          </ul>

          <div class="py-2 text-end">
               第<?= $p ?> 頁 , 共<?= $page_count ?>頁 , 共<?= $total ?> 筆資料
          </div>

     </nav>
</div>