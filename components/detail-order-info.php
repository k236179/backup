<?php
require("../project-conn.php");

$id=$_GET["id"];

$sql= "SELECT * FROM order_info WHERE id='$id'";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// if($rows>0){
//     foreach($rows as $row){
//         var_dump($row);
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>order-info edit</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
    
        
<div class="container mt-3">
    <form action="../components/update_order_info.php" method="post">
              <table class="table table-bordered">
                  
                <tbody>
                <?php if($rows>0): ?>
                <?php  foreach($rows as $row): ?>
                
                        <tr>
                            <td>ID</td>
                            <td><?=$row["id"] ?></td>
                            
                        </tr>

                        <tr>
                            <td>USER</td>
                            <td> <?=$row["user"] ?></td>
                        </tr>

                        <tr>
                            <td>COUPON</td>
                            <td><?=$row["coupon"] ?></td>
                        </tr>

                        <tr>
                            <td>CREATE TIME</td>
                            <td> <?=$row["create_time"]?></td>
                            
                        </tr>
                        <tr>
                            <td>DELIVERY</td>
                            <td><?=$row["delivery"] ?></td>
                        </tr>
                        <tr>
                            <td>RECEIPENT</td>
                            <td><?=$row["receipent"] ?></td>
                        </tr>

                        <tr>
                            <td>ADDRESS</td>
                            <td> <?=$row["address"] ?></td>
                        </tr>

                        <tr>
                            <td>PAY</td>
                            <td><?=$row["pay"] ?></td>
                        </tr>

                        <tr>
                            <td>STATUS</td>
                            <td> <?=$row["status"] ?></td>
                        </tr>

                        <tr>
                            <td>VALID</td>
                            <td> <?=$row["valid"] ?></td>
                        </tr>

                        <tr>
                            <td>DEADLINE</td>
                            <td><?=$row["deadline"] ?></td>
                        </tr>

                        
                <?php  endforeach; ?>
                <?php endif; ?>  

                    
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                  
                    <a class="btn btn-secondary" href="../page/index.php?current=order-info">回列表</a>
              </div>
    </form> 