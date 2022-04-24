<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
$id_type = $_GET["id_type"];
$id = $_GET["id"];

require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
if ($id_type == "product" & $id != "") {
    $sqlSELECT = "SELECT comment.*,
    user.name AS userName,
    product.id AS data01,
    product.name AS data02,
    product.price AS data03,
    product.express AS data04,
    product.createTime AS data05,
    product.description AS data06,
    product.inventory AS data07";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id";
} else if ($id_type == "user" & $id != "") {
    $sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id";
} else {
    $sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id";
}

$sqlFROM = "FROM comment,product,user";

$sql = "$sqlSELECT $sqlFROM $sqlWHERE";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$i = 1;

// var_dump($rows);
?>
<?php if ($id_type == "product" & $id != "") : ?>
<div class="card m-auto">
    <div class="card-body">
        <h5 class="card-title"><?= $rows[0]["data02"] ?> # <?= $rows[0]["data01"] ?></h5>
        <p class="card-text"><?= $rows[0]["data03"] ?></p>
        <p class="card-text"><?= $rows[0]["data04"] ?></p>
        <p class="card-text"><?= $rows[0]["data05"] ?></p>
        <p class="card-text"><?= $rows[0]["data06"] ?></p>
        <p class="card-text"><?= $rows[0]["data07"] ?></p>
    </div>
</div>
<div class="row justify-content-around">
    <?php foreach ($rows as $row) : ?>
    <div class="card p-3 my-3 col-5">
        <div class="row g-0 align-items-center mb-3">
            <div class="col-md-4 ">
                <img src="../img/user/user001.jpg" class="img-fluid rounded-circle" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text mb-1">會員 : <?= $row["userName"] ?></p>
                    <p class="card-text mb-1"><strong>評價 : </strong>
                        <?php
                                for ($i = 0; $i < $row["score"]; $i++) {
                                    echo " 讚 ";
                                }
                                ?>
                    </p>
                    <p class="card-text mb-2"><strong>評論 : </strong></p>
                    <h5 class="card-title border p-2"><?= $row["content"] ?></h5>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="btn-group  mb-1" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-primary">訂單</button>
                <button type="button" class="btn btn-outline-primary">收藏</button>
                <button type="button" class="btn btn-outline-primary">回報</button>
            </div>
        </div>
        <div class="row">
            <p class="text-center m-2"><small class="text-muted">建立時間 : <?= $row["createTime"] ?></small></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php elseif ($id_type == "user" & $id != "") : ?>

<?php else : ?>
<h2>評論一覽</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">user</th>
            <th scope="col">product</th>
            <th scope="col">score</th>
            <th scope="col">createTime</th>
            <th scope="col"><?php
                                $title = "新增評論";
                                $formType = "post-comment";
                                require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <?php foreach ($rows as $row) : ?>
    <tbody>
        <tr class="text-muted">
            <td># <?= $row["id"] ?></td>
            <td><?= $row["userName"] ?></td>
            <td><?= $row["proName"] ?></td>
            <td><?= $row["score"] ?></td>
            <td><?= $row["createTime"] ?></td>
            <td class="text-center">
                <button type="button" class="btn-sm btn-success">詳細</button>
                <button type="button" class="btn-sm btn-warning">隱藏</button>
                <button type="button" class="btn-sm btn-danger">刪除</button>
            </td>
        </tr>
        <tr class="lh-lg">
            <td class="text-center"><img style="width: 1.5rem;" src="../img/icon/sticky-notes.png" alt=""></td>
            <td colspan="5">
                <div style="max-height: 5rem;" class="overflow-auto"><?= $row["content"] ?></div>
            </td>
            <!-- <td class="text-center">
                <button type="button" class="btn-sm btn-success">
                    商品清單
                </button>
                <button type="button" class="btn-sm btn-success">詳細</button>
                <button type="button" class="btn-sm btn-warning">編輯</button>
                <button type="button" class="btn-sm btn-danger">刪除</button>
            </td> -->
        </tr>
    </tbody>
    <?php endforeach; ?>

</table>
<?php endif; ?>
<br>