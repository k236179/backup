<?php
require("../project-conn.php");

$id=$_GET["id"];

$sql= "SELECT * FROM order_item WHERE id='$id'";

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
    <form action="update_order_item.php" method="post">
              <table class="table table-bordered">
                  
                <tbody>
                <?php if($rows>0): ?>
                <?php  foreach($rows as $row): ?>
                
                        <tr>
                            <td></td>
                            <td><input class="form-control" name="id"  value="<?=$row["id"] ?>" type="hidden"></td>
                            
                        </tr>

                        <tr>
                            <td>PRODUCT</td>
                            <td> <input class="form-control" name="product" value="<?=$row["product"] ?>" type="text"></td>
                        </tr>

                        <tr>
                            <td>ORDER INFORMATION</td>
                            <td> <input class="form-control" name="order_info" value="<?=$row["order_info"] ?>" type="text"></td>
                        </tr>

                        <tr>
                            <td>CLASS</td>
                            <td> <input class="form-control" name="class" value="<?=$row["class"] ?>" type="text"></td>
                            
                        </tr>
                        <tr>
                            <td>AMOUNT</td>
                            <td> <input class="form-control" name="counter" value="<?=$row["counter"] ?>" type="text"></td>
                        </tr>
                        <tr>
                            <td>MEMO</td>
                            <td> <input class="form-control" name="memo" value="<?=$row["memo"] ?>" type="text"></td>
                        </tr>

                        <tr>
                            <td>VALID</td>
                            <td> <input class="form-control" name="valid" value="<?=$row["valid"] ?>" type="text"></td>
                        </tr>
                <?php  endforeach; ?>
                <?php endif; ?>  

                    
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary me-2" href="../page/index.php?current=order-item&order_info=">取消</a>
                    <button class="btn btn-secondary" type="submit">完成</button> 
              </div>
    </form> 
</div>
      
    
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