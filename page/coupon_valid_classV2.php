<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



$sql = "SELECT coupon_valid_class.id AS valid_class_id, coupon.name AS coupon_name, lessons.name AS lessons_name FROM coupon_valid_class, coupon, lessons 
WHERE coupon_valid_class.coupon = coupon.id AND coupon_valid_class.class = lessons.id;";

// $sql = "SELECT * FROM coupon_valid_class";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<div class="container-fluid">
    <div class="row gx-2">
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
                    <th scope="row"><?= $row["valid_class_id"] ?></th>
                    <td><?= $row["coupon_name"] ?></td>
                    <td><?= $row["lessons_name"] ?></td>
                    <td><a class="btn btn-sm btn-warning" href="/project/api/coupon_valid_class/edit_coupon.php?id=<?= $row["valid_class_id"] ?>">編輯</a></td>
                    <td><a class="btn btn-sm btn-danger" href="/project/api/coupon_valid_class/delete_coupon.php?id=<?= $row["valid_class_id"] ?>">刪除</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>