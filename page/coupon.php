<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
$sql = "SELECT * FROM coupon ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候

?>
<!-- 清單 -->
<div class="form p-3">
    <h2>優惠券一覽</h2>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>code</td>
                <td>discount</td>
                <td>expiry</td>
                <td>limited</td>
                <td>valid</td>
                <th scope="col"><?php
                                $title = "新增優惠券";
                                $formType = "post-coupon";
                                require("../components/post-offcanvas.php") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["code"] ?></td>
                <td><?= $row["discount"] ?></td>
                <td><?= $row["expiry"] ?></td>
                <td><?= $row["limited"] ?></td>
                <td><?= $row["valid"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
?>