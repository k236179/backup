<?php

$id=$_GET["id"];

require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");
$sql="SELECT * FROM user WHERE id='$id' AND valid=1";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-4">
                  <div class="py-2">
                      <a class="btn btn-info text-white" href="user-form.php">回列表</a>
                  </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">account</th>
                            <th scope="col">password</th>
                            <th scope="col">gender</th>
                            <th scope="col">birthday</th>
                            <th scope="col">phone</th> 
                            <th scope="col">photo</th> 
                            <th scope="col">createTime</th>
                            <th scope="col">valid</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?=$row["id"]?></td>
                            <td><?=$row["name"]?></td>
                            <td><?=$row["account"]?></td>
                            <td><?=$row["password"]?></td>
                            <td><?=$row["gender"]?></td>
                            <td><?=$row["birthday"]?></td>
                            <td><?=$row["phone"]?></td>
                            <td><?=$row["photo"]?></td>
                            <td><?=$row["createTime"]?></td>
                            <td><?=$row["valid"]?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                
                </table>
              </div>
          </div>
      </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>