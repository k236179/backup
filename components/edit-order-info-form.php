<?php
require("../project-conn.php");

$id = $_GET["id"];

$sql = "SELECT * FROM order_info WHERE id='$id'";

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


<body>


    <form action="../components/update_order_info.php" method="post">
        <table class="table table-bordered">

            <tbody>
                <?php if ($rows > 0) : ?>
                <?php foreach ($rows as $row) : ?>

                <tr>
                    <td></td>
                    <td><input class="form-control" name="id" value="<?= $row["id"] ?>" type="hidden"></td>

                </tr>

                <tr>
                    <td>USER</td>
                    <td> <input class="form-control" name="user" value="<?= $row["user"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>COUPON</td>
                    <td> <input class="form-control" name="coupon" value="<?= $row["coupon"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>CREATE TIME</td>
                    <td> <?= $row["create_time"] ?></td>

                </tr>
                <tr>
                    <td>DELIVERY</td>
                    <td> <input class="form-control" name="delivery" value="<?= $row["delivery"] ?>" type="text"></td>
                </tr>
                <tr>
                    <td>RECEIPENT</td>
                    <td> <input class="form-control" name="receipent" value="<?= $row["receipent"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>ADDRESS</td>
                    <td> <input class="form-control" name="address" value="<?= $row["address"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>PAY</td>
                    <td> <input class="form-control" name="pay" value="<?= $row["pay"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>STATUS</td>
                    <td> <input class="form-control" name="status" value="<?= $row["status"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>VALID</td>
                    <td> <input class="form-control" name="valid" value="<?= $row["valid"] ?>" type="text"></td>
                </tr>

                <tr>
                    <td>DEADLINE</td>
                    <td> <input class="form-control" name="deadline" value="<?= $row["deadline"] ?>" type="text"></td>
                </tr>


                <?php endforeach; ?>
                <?php endif; ?>


            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button class="btn btn-secondary me-2" type="submit">完成</button>
            <a class="btn btn-secondary" href="../page/index.php?current=order-info">取消</a>
        </div>
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