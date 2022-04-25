<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$sql = "SELECT * FROM lessons";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
?>
<h2>課程一覽</h2>
<table class="table table-striped table-hover my-3">
    <thead>
        <tr>
                <th>編號</th>
                <th><img style="width: 1.5rem;" src="../img/icon/user.png" alt="">課程名稱</th>
                <th><img style="width: 1.5rem;" src="../img/icon/credit-card.png" alt="">課程價格</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt="">課程簡介</th>
                <th><img style="width: 1.5rem;" src="../img/icon/calendar.png" alt="">課程日期</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt="">課程時長</th>
                <th>Valid</th>
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
            <td><a type="button" class="btn-sm btn-warning"  href="/project/api/class/edit_class.php?id=<?= $row["id"] ?>">編輯</a>
            <a type="button" class="btn-sm btn-danger" class="btn btn-danger text-white" href="/project/api/class/delete_class.php?id=<?= $row["id"] ?>">刪除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</table>