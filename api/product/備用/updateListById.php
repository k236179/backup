<!-- 修改資料php -->

<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

    $id = $_POST["id"];

    $name = $_POST["name"];
    $price = $_POST["price"];
    // $category = $_POST["category"];
    $express = $_POST["express"];
    $createTime = date("Y/m/d/H/i/s");
    $description = $_POST["description"];
    $inventory = $_POST["inventory"];
    $launched = $_POST["launched"];
    // $images = $_POST["images"];
    $valid = $_POST["valid"];


    $sql = "UPDATE product SET name='$name', price='$price', express='$express', description='$description', inventory='$inventory', launched='$launched', valid='$valid' WHERE id = '$id'
    ";


    if ($conn->query($sql) === TRUE) {
        // echo "新增資料完成";
        header("location: form.php");
        exit;
        
    } else {
        echo "新增資料錯誤: " . $conn->error;
    }

    $conn->close();

?>