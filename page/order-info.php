<?php
require("../project-conn.php");

$sql = "SELECT * FROM order_info ";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// if($rows>0){
//     foreach($rows as $row){
//         var_dump($row);
//     }
// }
?>
<h2>訂單一覽</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">ORDER INFORMATION</th>
            <th scope="col">CLASS</th>
            <th scope="col">AMOUNT</th>
            <th scope="col">MEMO</th>
            <th scope="col"><?php
                            $title = "新增訂單";
                            $formType = "post-order-info";
                            require_once("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>

        <?php if ($rows > 0) : ?>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td>#</td>
            <td><?= $row["id"] ?></td>
            <td><?= $row["user"] ?></td>
            <!-- <td> <input class="form-control" name="product" value="" type="text"></td> -->
            <td><?= $row["coupon"] ?></td>
            <!-- <td> <input class="form-control" name="order_info" value="" type="text"></td> -->
            <td><?= $row["create_time"] ?></td>
            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
            <td><?= $row["delivery"] ?></td>
            <!-- <td> <input class="form-control" name="class" value="" type="text"></td> -->
            <td><?= $row["receipent"] ?></td>
            <!-- <td> <input class="form-control" name="counter" value="" type="text"></td> -->
            <td><?= $row["address"] ?></td>
            <!-- <td> <input class="form-control" name="memo" value="" type="text"></td> -->
            <td><?= $row["pay"] ?></td>
            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
            <td><?= $row["status"] ?></td>
            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
            <td><?= $row["valid"] ?></td>
            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
            <td><?= $row["deadline"] ?></td>
            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <a class="btn btn-danger me-2" href="order_info_delete.php?id=<?= $row["id"] ?>">刪除</a>
    <a class="btn btn-secondary me-2" href="" type="submit">編輯</a>
    <a class="btn btn-secondary" href="order_info.php" type="submit">回列表</a>
</div>


</form>