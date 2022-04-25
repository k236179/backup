<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$sql = "SELECT * FROM coupon_valid_class";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<table class="table table-striped table-hover my-3">
    <thead>
        <tr>
            <th>編號</th>
            <th>Coupon</th>
            <th>Class</th>
            <th>btn1</th>
            <th>btn2</th>
            <th><?php
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
            <td><a class="btn btn-sm btn-warning" href="/project/api/coupon_valid_class/edit_coupon.php?id=<?= $row["id"] ?>">編輯</a></td>
            <td><a class="btn btn-sm btn-danger" href="/project/api/coupon_valid_class/delete_coupon.php?id=<?= $row["id"] ?>">刪除</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>