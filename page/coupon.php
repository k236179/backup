<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
if (!isset($_GET["p"])) {
     $p = 1;
} else {
     $p = $_GET["p"];
}
if (!isset($_GET["type"])) {
     $type = "1";
} else {
     $type = $_GET["type"];
}


switch ($type) {
          // 如果type的值是1的話
     case "1":
          $order = "limited ASC";
          break;
     case "2":
          $order = "limited DESC";
          break;
     case "3":
          $order = "discount ASC";
          break;
     case "4":
          $order = "discount DESC";
          break;
}

//計算總共有幾筆資料
$sql = "SELECT * FROM coupon ";
$result = $conn->query($sql);
$total = $result->num_rows;
//與總共要計算幾筆分頁有關係

//計算分頁
$per_page = 5;
$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM coupon ORDER BY $order LIMIT $start,$per_page ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$page_count = CEIL($total / $per_page);
//總共會有幾頁




//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候

?>



<h3>優惠券一覽</h3>
<div class="text-end mb-2">
    <a class="btn btn-info text-white"
        href="http://localhost:8080/project/page/index.php?current=coupon&p=<?= $p ?>&type=1">
        <img style="max-width: 25px" src="../img/icon/arrow 2.png" alt=""> 使用次數</a>
    <a class="btn btn-info text-white"
        href="http://localhost:8080/project/page/index.php?current=coupon&p=<?= $p ?>&type=2">
        <img style="max-width: 25px" src=" ../img/icon/arrow.png" alt=""> 使用次數</a>
</div>
<div class="text-end ">
    <a class="btn btn-info text-white"
        href="http://localhost:8080/project/page/index.php?current=coupon&p=<?= $p ?>&type=3">
        <img style="max-width: 25px" src="../img/icon/arrow 2.png" alt=""> 折扣</a>
    <a class="btn btn-info text-white"
        href="http://localhost:8080/project/page/index.php?current=coupon&p=<?= $p ?>&type=4">
        <img style="max-width: 25px" src=" ../img/icon/arrow.png" alt=""> 折扣</a>
</div>
<div class="row">
    <table class="table table-striped table-hover my-3">
        <thead>
            <tr>
                <th>編號</th>
                <th><img src="../img/icon/ticket.png" class="img-fluid rounded-start" style="max-width:25px" /> 優惠券</th>
                <!-- bs5 照片大小使用style -->
                <th><img src="../img/icon/barcode.png" class="img-fluid rounded-start" style="max-width:25px" /> 序號</th>
                <th><img src="../img/icon/discount.png" class="img-fluid rounded-start" style="max-width:25px" /> 折扣%
                </th>
                <th colspan="2"><img src="../img/icon/date.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> 使用期限</th>
                <th><img src="../img/icon/limited.png" class="img-fluid rounded-start" style="max-width:25px" /> 使用次數
                </th>
                <th><img src="../img/icon/valid.png" class="img-fluid rounded-start" style="max-width:25px" /> 啟用</th>
                <th scope="col"><?php
                                        $title = "新增優惠券";
                                        $formType = "post-coupon";
                                        require("../components/post-offcanvas.php") ?></th>
            </tr>
        </thead>
        <tbody>
            <!-- 標準欄位 -->
            <?php foreach ($rows as $row) : ?>

            <tr>
                <td># <?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["code"] ?></td>
                <td><?= $row["discount"] ?>%</td>
                <td colspan="2"><?= $row["expiry"] ?></td>
                <td><?php
                              if ($row["limited"] == 0) {
                                   echo "無限制使用次數";
                              } else {
                                   echo $row["limited"];
                              }
                              ?></td>
                <td><?= $row["valid"] ?></td>
                <td></td>

            </tr>
            <tr>
                <td class="text-center"><img style="width: 1.5rem;" src="../img/icon/sticky-notes.png" alt=""></td>
                <td colspan="6">
                    <span class="text-muted"><small>備註內容</small></span>
                </td>
                <td colspan="1" class="text-center">

                    <button type="button" class="btn-sm btn-info ">
                        <a class="text-white"
                            href="/project/page/index.php?id_type=coupon_id&id=<?= $row["id"] ?>&current=coupon_valid_product">詳細資訊</a></button>
                    <?php require("../components/edit-modal-coupon.php") ?>
                    <button type="button" class="btn-sm btn-danger ">
                        <a class="text-white"
                            href="/project/api/coupon/備用/form-post-delete.php?id=<?= $row["id"] ?>">刪除</a></button>

                </td>
                <td></td>
            </tr>

            <?php endforeach; ?>



        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
            <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link"
                    href="index.php?current=coupon&p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
            <?php endfor ?>
        </ul>

        <div class="py-2 text-end">
            第<?= $p ?> 頁 , 共<?= $page_count ?>頁 , 共<?= $total ?> 筆資料
        </div>

    </nav>
</div>