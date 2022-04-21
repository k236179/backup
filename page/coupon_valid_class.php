<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$sql = "SELECT * FROM coupon_valid_class";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Coupon</th>
            <th scope="col">Class</th>
            <th scope="col">btn1</th>
            <th scope="col">btn2</th>
            <th scope="col"><?php
                            $title = "新增適用課程";
                            $formType = "post-couponValidClass";
                            require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["coupon"] ?></td>
            <td><?= $row["class"] ?></td>
            <td><a class="btn btn-info text-white" href="edit_coupon.php?id=<?= $row["id"] ?>">編輯</a></td>
            <td><a class="btn btn-danger text-white" href="delete_coupon.php?id=<?= $row["id"] ?>">刪除</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>