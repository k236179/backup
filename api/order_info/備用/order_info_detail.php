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

    <title>order-item</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
    
        
<div class="container mt-3">
    
              <table class="table table-bordered">
                  
                <tbody>
                <?php if($rows>0): ?>
                <?php  foreach($rows as $row): ?>
                
                        <tr>
                            <td>#</td>
                            <td><?=$row["id"]?></td>
                            
                        </tr>

                        <tr>
                            <td>USER</td>
                            <td><?=$row["user"]?></td>
                            <!-- <td> <input class="form-control" name="product" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>COUPON</td>
                            <td><?=$row["coupon"]?></td>
                            <!-- <td> <input class="form-control" name="order_info" value="" type="text"></td> -->
                        </tr> 
                        
                        <tr>
                            <td>CREATE TIME</td>
                            <td><?=$row["create_time"]?></td>
                            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>DELIVERY</td>
                            <td><?=$row["delivery"]?></td>
                            <!-- <td> <input class="form-control" name="class" value="" type="text"></td> -->
                            
                        </tr>
                        <tr>
                            <td>RECEIPENT</td>
                            <td><?=$row["receipent"]?></td>
                            <!-- <td> <input class="form-control" name="counter" value="" type="text"></td> -->
                        </tr>
                        <tr>
                            <td>ADDRESS</td>
                            <td><?=$row["address"]?></td>
                            <!-- <td> <input class="form-control" name="memo" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>PAY</td>
                            <td><?=$row["pay"]?></td>
                            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>STATUS</td>
                            <td><?=$row["status"]?></td>
                            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>VALID</td>
                            <td><?=$row["valid"]?></td>
                            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
                        </tr>

                        <tr>
                            <td>DEADLINE</td>
                            <td><?=$row["deadline"]?></td>
                            <!-- <td> <input class="form-control" name="valid" value="" type="text"></td> -->
                        </tr>
               

                    
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                    <a class="btn btn-danger me-2" href="order_info_delete.php?id=<?= $row["id"]?>">刪除</a>
                    <a class="btn btn-secondary me-2" href="" type="submit">編輯</a> 
                    <a class="btn btn-secondary" href="order_info.php" type="submit">回列表</a> 
              </div>
              
              <?php  endforeach; ?>
              <?php endif; ?>  
    </form>  
</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>


<!-- jquery ajax -->
<!-- 
$.ajax({
            method: "POST",
            url: "api-users.php",
            dataType: "json",
        })
        .done(function(response) {
            // console.log(response)
            response.forEach(function(user) {
                document.write(`${user.name}: ${user.email}<br>`);
            })

        }).fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        }); 
-->