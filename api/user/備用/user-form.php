<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");
$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
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

    <title>User Form</title>
</head>
<style>
.form {
    width: 50vw;
    margin: 3rem auto;
}
</style>

<body>
    <div class="form shadow p-3">
        <!-- 表單 -->
        <form action="./post.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="inpit1" class="form-label">name</label>
                <input type="text" class="form-control" name="name" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">account</label>
                <input type="text" class="form-control" name="account" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">password</label>
                <input type="text" class="form-control" name="password" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">gender</label>
                <input type="text" class="form-control" name="gender" id="inpit1" placeholder="輸入">
            </div>
            <div class="mb-2">
                     <label for="inpit1">birthday</label>
                    <div class="row">
                         <div class="col">
                         <input type="text" id="startY"
                         class="form-control" name="startY" placeholder="YYYY" required
                         >年
                         </div>
                         <div class="col">
                         <input type="text" id="startY"
                         class="form-control" name="startM" placeholder="MM" required
                         >月
                         </div>
                         <div class="col">
                         <input type="text" id="startY"
                         class="form-control" name="startD" placeholder="DD" required
                         >日
                    </div>
                <div class="mb-3">
                    <label for="inpit1" class="form-label">phone</label></label>
                    <input type="text" class="form-control" name="phone" id="inpit1" placeholder="輸入">
                    <label for="inpit1" class="form-label">photo</label></label>
                    <input type="text" class="form-control" name="photo" id="inpit1" placeholder="輸入">
                </div>            

            <!-- 送出按鈕 -->
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
            </div>
        </form>

    </div>

    <!-- 清單 -->
    <div class="form shadow p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">account</th>
                    <!-- <th scope="col">password</th> -->
                    <!-- <th scope="col">gender</th> -->
                    <!-- <th scope="col">birthday</th> -->
                    <th scope="col">phone</th> 
                    <th scope="col">photo</th> 
                    <th scope="col">createTime</th>
                    <th scope="col">valid</th>
                                
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach($rows as $row) : ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["account"]?></td>
                    <!-- <td><?=$row["password"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["birthday"]?></td> -->
                    <td><?=$row["phone"]?></td>
                    <td><?=$row["photo"]?></td>
                    <td><?=$row["createTime"]?></td>
                    <td><?=$row["valid"]?></td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="user-edit.php?id=<?=$row["id"]?>">編輯</a>
                    </td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="deleteListById.php?id=<?=$row["id"]?>">刪除</a>
                    </td>
                    <td>
                        <a class="btn btn-info text-white"
                        href="user.php?id=<?=$row["id"]?>">詳細</a>
                    </td>             
                </tr>
                 <?php endforeach; ?>
            </tbody>
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