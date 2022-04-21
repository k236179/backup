<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$sql = "SELECT * FROM comment";
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
            <th scope="col">id</th>
            <th scope="col">user</th>
            <th scope="col">product</th>
            <th scope="col">content</th>
            <th scope="col">score</th>
            <th scope="col">createTime</th>
            <th scope="col">valid</th>
            <th scope="col"><?php
                            $title = "新增評論";
                            $formType = "post-comment";
                            require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <?php foreach ($rows as $row) : ?>
    <tbody>
        <tr>
            <th><?= $i++ ?></th>
            <td><?= $row["id"] ?></td>
            <td><?= $row["user"] ?></td>
            <td><?= $row["product"] ?></td>
            <td><?= $row["content"] ?></td>
            <td><?= $row["score"] ?></td>
            <td><?= $row["createTime"] ?></td>
            <td><?= $row["valid"] ?></td>
            <td><a class="btn btn-info text-white" href="edit_class.php?id=<?= $row["id"] ?>">編輯</a></td>
            <td><a class="btn btn-danger text-white" href="delete_class.php?id=<?= $row["id"] ?>">刪除</a></td>
        </tr>
    </tbody>
    <?php endforeach; ?>

</table>
</table>