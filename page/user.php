<?php
require("../project-conn.php");
$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>
<h2>會員一覽</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">account</th>
            <!-- <th scope="col">password</th> -->
            <!-- <th scope="col">gender</th> -->
            <!-- <th scope="col">birthday</th> -->
            <th scope="col">phone</th>
            <th scope="col">photo</th>
            <th scope="col">createTime</th>
            <th scope="col">valid</th>
            <th scope="col"><?php
                            $title = "新增會員";
                            $formType = "post-user";
                            require_once("../components/post-offcanvas.php") ?></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["account"] ?></td>
            <!-- <td><?= $row["password"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["birthday"] ?></td> -->
            <td><?= $row["phone"] ?></td>
            <td><?= $row["photo"] ?></td>
            <td><?= $row["createTime"] ?></td>
            <td><?= $row["valid"] ?></td>
            <td>
                <a class="btn btn-info text-white" href="user-edit.php?id=<?= $row["id"] ?>">編輯</a>
            </td>
            <td>
                <a class="btn btn-info text-white" href="deleteListById.php?id=<?= $row["id"] ?>">刪除</a>
            </td>
            <td>
                <a class="btn btn-info text-white" href="user.php?id=<?= $row["id"] ?>">詳細</a>
            </td>
            <?php endforeach; ?>
    </tbody>
</table>