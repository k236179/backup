<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
$sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName";
$sqlFROM = "FROM comment,product,user";
$sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id";
$sql = "$sqlSELECT $sqlFROM $sqlWHERE";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$i = 1;

// var_dump($rows);
?>
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
</table>