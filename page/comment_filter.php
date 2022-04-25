<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$per_page = 6;
$start = ($p - 1) * $per_page;




$id_type = $_GET["id_type"];
$id = $_GET["id"];

if ($id_type == "product" & $id != "") {

    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id AND $id_type=$id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,
    user.name AS userName,
    user.photo AS userPhoto,
    product.id AS data01,
    product.name AS data02,
    product.price AS data03,
    product.express AS data04,
    product.createTime AS data05,
    product.description AS data06,
    product.inventory AS data07";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id LIMIT $start, $per_page";
} else if ($id_type == "user" & $id != "") {
    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id AND $id_type=$id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,
    product.name AS productName,
    product.id AS productId,
    user.id AS data01,
    user.name AS data02,
    user.account AS data03,
    user.gender AS data04,
    user.birthday AS data05,
    user.phone AS data06,
    user.photo AS data07,
    user.createTime AS data08";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id LIMIT $start, $per_page";
    //計算頁數
    $pageSql = "SELECT order_info.*, user.name FROM order_info, user WHERE order_info.user=user.id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
} else {
    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id LIMIT $start, $per_page";
}

$sqlFROM = "FROM comment,product,user";

$sql = "$sqlSELECT $sqlFROM $sqlWHERE";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rows_num = $result->num_rows;
$i = 1;

// var_dump($rows);
?>

<!-- 篩選表單 -->
<form class="mb-3" action="http://localhost:8080/project/page/index.php">
    <fieldset>
        <legend>篩選條件</legend>
        <div class="row mb-3 w-50">
            <div class="col">
                <label for="id_type" class="form-label">類型</label>
                <select id="id_type" class="form-select" name="id_type">
                    <option>請選擇類型</option>
                    <option value="product">商品</option>
                    <option value="user">用戶</option>
                </select>
            </div>
            <div class="col"> <label for="id" class="form-label">ID</label>
                <input type="number" id="id" class="form-control" name="id" placeholder="輸入 # ID" min="1" required>
            </div>
        </div>
        <input type="hidden" name="current" value="comment_filter">
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>

<!-- 篩選product -->
<!-- 篩選product -->

<?php if ($id_type == "product" & $id != "") : ?>
<h5><strong>本次篩選結果:</strong></h5>

<div class="mb-3"><a href="http://localhost:8080/project/page/index.php?id_type&id&current=comment_filter">清空本次條件</a>
</div>
<?php if ($rows_num > 0) : ?>
<div class="card m-auto">
    <div class="card-body">
        <h5 class="card-title"><?= $rows[0]["data02"] ?> # <?= $rows[0]["data01"] ?></h5>
        <p class="card-text"><?= $rows[0]["data03"] ?></p>
        <p class="card-text"><?= $rows[0]["data04"] ?></p>
        <p class="card-text"><?= $rows[0]["data05"] ?></p>
        <p class="card-text"><?= $rows[0]["data06"] ?></p>
        <p class="card-text"><?= $rows[0]["data07"] ?></p>
        <p class="card-text"><?= $rows[0]["data07"] ?></p>
    </div>
</div>
<div class="row justify-content-around">
    <?php foreach ($rows as $row) : ?>
    <div class="card p-3 my-3 col-5">
        <div class="row g-0 align-items-center mb-3">
            <div class="col-md-4 ">
                <img src="../img/user/<?= $row["userPhoto"] ?>" class="img-fluid rounded border border-3" alt="..." />
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
    <?php else : ?>
    <p>本次結果 : </p>
    <p><?= $id_type ?> #<?= $id ?> : 資料為空</p>
    <?php endif; ?>
</div>

<!-- 篩選user -->
<!-- 篩選user -->

<?php elseif ($id_type == "user" & $id != "") : ?>
<h5><strong>本次篩選結果:</strong></h5>
<div class="mb-3"><a href="http://localhost:8080/project/page/index.php?id_type&id&current=comment_filter">清空本次條件</a>
    <?php if ($rows_num > 0) : ?>

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
                    <img src="../img/product/<?= $row["data07"] ?>" class="img-fluid rounded-circle" alt="..." />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text mb-1">商品 : <?= $row["productName"] ?> # <?= $row["productId"] ?></p>
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
                    <button type="button" class="btn btn-outline-primary">隱藏</button>
                    <button type="button" class="btn btn-outline-primary">刪除</button>
                    <button type="button" class="btn btn-outline-primary">回報</button>
                </div>
            </div>
            <div class="row">
                <p class="text-center m-2"><small class="text-muted">建立時間 : <?= $row["createTime"] ?></small></p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <p>本次結果 : </p>
        <p><?= $id_type ?> #<?= $id ?> : 資料為空</p>
        <?php endif; ?>
    </div>

    <!-- 預設無篩選條件 -->
    <!-- 預設無篩選條件 -->
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
    <div>
        <nav aria-label="Page navigation ">
            <ul class="pagination  d-flex justify-content-around">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($p == $i) echo "active"; ?> "><a class="page-link"
                        href="../page/index.php?current=order-info&p=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
        <div class="text-center">共<?= $total ?>筆資料，<?= $page_count ?>頁</div>
    </div>
    <br>