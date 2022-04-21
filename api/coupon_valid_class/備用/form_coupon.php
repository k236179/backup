<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$sql = "SELECT * FROM coupon_valid_class";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($rows);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Coupon</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
    <!-- 清單 -->
    <div class="form shadow p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Class</th>
                    <th scope="col">btn1</th>
                    <th scope="col">btn2</th>
                </tr>
            </thead>
            <?php foreach($rows as $row): ?>
            <tbody>
                <tr>
                    <th scope="row"><?=$row["id"]?></th>
                    <td><?=$row["coupon"]?></td>
                    <td><?=$row["class"]?></td>
                    <td><a class="btn btn-info text-white" href="edit_coupon.php?id=<?=$row["id"]?>">編輯</a></td>
                    <td><a class="btn btn-danger text-white" href="delete_coupon.php?id=<?=$row["id"]?>">刪除</a></td>
                </tr>
            </tbody>
            <?php  endforeach;?>
            <td><a class="btn btn-success text-white" href="create_coupon.php">新增</a></td>

        </table>
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

<!-- $.ajax({
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
        });  -->
