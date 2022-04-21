<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


// $id = $_GET["id"];
// $id_type = $_GET["id_type"];


$sql = "SELECT * FROM coupon_valid_class WHERE valid = '1'";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Get</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <form action="post_coupon.php" method="post">
            <div class="mb-2">
                <label for="name">coupon</label>
                <input type="text" id="coupon" class="form-control" name="coupon" required>
            </div>
            <div class="mb-2">
                <label for="class">class</label>
                <input type="" id="class" class="form-control" name="class" required>
            </div>
            <div class="mb-2">
                <label for="class">valid</label>
                <input type="" id="valid" class="form-control" name="valid" required>
            </div>
            <button type="submit" class="btn btn-info">送出</button>
        </form>
      </div>

  </body>
</html>