<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");


// $id = $_GET["id"];
// $id_type = $_GET["id_type"];


$sql = "SELECT * FROM lessons WHERE valid = '1'";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>create</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <form action="post_class.php" method="post">
            <div class="mb-2">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="mb-2">
                <label for="price">Price</label>
                <input type="price" id="price" class="form-control" name="price" required>
            </div>
            <div class="mb-2">
                <label for="description">Description</label>
                    <input type="text" id="description" class="form-control" name="description" >
            </div>
            <div class="mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" class="form-control" name="date" required>
            </div>
            <div class="mb-2">
                <label for="duration">duration</label>
                    <input type="" id="duration" class="form-control" name="duration" >
            </div>
            <button type="submit" class="btn btn-info">送出</button>
        </form>
      </div>

  </body>
</html>