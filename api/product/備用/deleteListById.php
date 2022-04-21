<!-- 硬刪除 -->

<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $sql = "SELECT * FROM product";

    $id = $_GET["id"];

    $sql = "DELETE FROM product WHERE  id = $id";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "刪除成功";
    } else {
        echo "刪除失敗: " . $conn->error;
        exit;
    }



    $conn->close();

?>