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
        <form action="http://localhost:8080/project/api/user/post.php" method="POST">
            <!-- 普通欄位 -->
            <div class="mb-3">
                <label for="inpit1" class="form-label">姓名</label>
                <input type="text" class="form-control" name="name" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">帳號</label>
                <input type="text" class="form-control" name="account" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">密碼</label>
                <input type="text" class="form-control" name="password" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">性別</label>
                <input type="text" class="form-control" name="gender" id="inpit1" placeholder="輸入">
                <label for="inpit1">生日</label>
                <input type="date" class="form-control" name="birthday" id="inpit1" placeholder="輸入">  
                <label for="inpit1" class="form-label">電話</label></label>
                <input type="text" class="form-control" name="phone" id="inpit1" placeholder="輸入">
                <label for="inpit1" class="form-label">照片</label></label>
                <input type="text" class="form-control" name="photo" id="inpit1" placeholder="輸入">
            </div>            

            <!-- 送出按鈕 -->
            <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-lg ">送出</button></button>
            </div>
        </form>

    </div>

    
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