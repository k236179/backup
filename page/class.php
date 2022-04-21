<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$sql = "SELECT * FROM lessons";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
?>
<h2>課程一覽</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">description</th>
            <th scope="col">date</th>
            <th scope="col">duration</th>
            <th scope="col">valid</th>
            <th scope="col"><?php
                            $title = "新增課程";
                            $formType = "post-class";
                            require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td class="description"><?= $row["description"] ?></td>
            <td><?= $row["date"] ?></td>
            <td><?= $row["duration"] ?> hours</td>
            <td><?= $row["valid"] ?></td>
            <td><a class="btn btn-info text-white" href="edit_class.php?id=<?= $row["id"] ?>">編輯</a></td>
            <td><a class="btn btn-danger text-white" href="delete_class.php?id=<?= $row["id"] ?>">刪除</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</table>