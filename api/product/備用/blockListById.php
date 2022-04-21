<!-- 軟刪除 -->

<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT * FROM product";

    $id = $_GET["id"];
    $block = $_GET["block"];


    $sql = "SELECT * FROM product WHERE id = $id";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($rows as $row) {
        $target = $row['id'];
        $sql = "UPDATE product SET valid='$block' WHERE id='$target'";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "更新資料錯誤: " . $conn->error;
            exit;
        }
    }
    echo "更新成功";

    $conn->close();

?>