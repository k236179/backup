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
$per_page = 10;
$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM user  LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$page_count = CEIL($total / $per_page);
?>
<h2>會員一覽</h2>
<table class="table table-striped table-hover my-3">
    <thead>
        <tr>
            <th>#</th>
            <th class="img-fluid rounded-start" style="max-width:25px">姓名</th>
            <th class="img-fluid rounded-start" style="max-width:25px">帳號</th>
            <!-- <th scope="col">密碼</th> -->
            <!-- <th scope="col">性別</th> -->
            <!-- <th scope="col">生日</th> -->
            <th class="img-fluid rounded-start" style="max-width:25px">電話</th>
            <!-- <th class="img-fluid rounded-start" style="max-width:25px">照片</th> -->
            <th class="img-fluid rounded-start" style="max-width:25px">建立時間</th>
            <th class="img-fluid rounded-start" style="max-width:25px">黑名單</th>
            <th scope="col"><?php
                            $title = "新增會員";
                            $formType = "post-user";
                            require_once("../components/post-offcanvas.php") ?></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td># <?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["account"] ?></td>
            <!-- <td><?= $row["password"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["birthday"] ?></td> -->
            <td><?= $row["phone"] ?></td>
            <!-- <td><?= $row["photo"] ?></td> -->
            <td><?= $row["createTime"] ?></td>
            <td><?= $row["valid"] ?></td>
            <td></td>
            
        </tr>  
        <tr>
        <td colspan="6" class="text-end">
                <button type="button" class="btn-sm btn-info ">
                    <a class="text-white" href="../components/edit-user.php?id=<?= $row["id"] ?>">詳細資訊</a></button>
                <button type="button" class="btn-sm btn-warning ">
                    <a class="text-white" href="../components/edit-user.php?id=<?= $row["id"] ?>">編輯</a></button>
                <button type="button" class="btn-sm btn-danger ">
                    <a class="text-white" href="../components/delete-user.php?id=<?= $row["id"] ?>">刪除</a></button>
            </td>
            <td> </td>
        </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="index.php?current=user&p=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor ?>
        </ul>
</nav>