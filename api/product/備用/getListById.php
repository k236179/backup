<!-- 取資料php -->

<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


    $id = $_GET["id"];


    $sql = "SELECT * FROM product WHERE id = $id AND valid = '1'";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($rows);

    $conn->close();

?>