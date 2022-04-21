<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


$id = $_GET["id"];
$id_type = $_GET["id_type"];


$sql = "SELECT * FROM user WHERE $id_type = $id AND valid = '1'";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($rows);

$conn->close();