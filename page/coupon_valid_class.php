<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (isset($_GET["id_type"]) && isset($_GET["id"])) {
    $id_type = $_GET["id_type"];
    $id = $_GET["id"];
$sql = "SELECT coupon_valid_class. * ,
lessons.name AS class_name,  
coupon.name 
FROM coupon_valid_class,coupon,lessons
WHERE coupon.id=coupon_valid_class.coupon 
AND lessons.id=coupon_valid_class.class
AND $id_type = $id";
}else{
$sql = "SELECT * FROM coupon_valid_class";

}


$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<form action="../page/index.php">
            <!-- 功能為導去哪一個網址 -->
            <div class="row ">
                <select name="id_type" class="form-select mb-3  col " aria-label="Default select example">
                    <option value="class" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "class") {
                                                    echo "selected";
                                                } ?>>課程 ID</option>
                    <option value="coupon" <?php if (isset($_GET["id_type"]) && $_GET["id_type"] == "coupon") {
                                                    echo "selected";
                                                } ?>>優惠券 ID</option>
                    <!-- 可以使用迴圈的寫法 -->
                </select>
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID : </span>
                        <input type="number" class="form-control" name="id" value="<?= $id ?>">
                    </div>
                </div>

                <div class="col-auto">
                    <input type="text" class="d-none" value="coupon_valid_class" name="current">
                    <!-- 如果沒有這個，網頁會get不到東西 -->
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-info text-white">篩選</button>
                </div>
        </form>




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
            <td><?= $row["name"] ?></td>
            <td><?= $row["class_name"] ?></td>
            <td><a class="btn btn-sm btn-warning" href="/project/api/coupon_valid_class/edit_coupon.php?id=<?= $row["id"] ?>">編輯</a></td>
            <td><a class="btn btn-sm btn-danger" href="/project/api/coupon_valid_class/delete_coupon.php?id=<?= $row["id"] ?>">刪除</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>