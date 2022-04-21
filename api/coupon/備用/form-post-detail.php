<?php
if(!isset($_GET["id"])){
     header("location: 404.php");

}


$id=$_GET["id"];
// 透過網址可以提出不同的資料
require_once("./project-conn.php");
$sql = "SELECT * FROM coupon WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(!$row){
     header("location: 404.php");
}

?>





<!doctype html>
<html lang="en">
  <head>
       
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  
  <div class="container">
       <div class="row justify-conteat-center">
          <div class="col-lg-4">
               <div class="py-2">
                    <a class="btn btn-info text-white" href="form-post.php">
                         回列表
                    </a>
               </div>
               <table class="table table-bordered">
                    <tr>
                         <th>id</th>
                         <th><?=$row["id"]?></th>
                    </tr>
                    <tr>
                         <th>name</th>
                         <th><?=$row["name"]?></th>
                    </tr>
                    <tr>
                         <th>code</th>
                         <th><?=$row["code"]?></th>
                    </tr>
                    <tr>
                         <th>discount</th>
                         <th><?=$row["discount"]?></th>
                    </tr>
                    <tr>
                         <th>expiry</th>
                         <th><?=$row["expiry"]?></th>
                    </tr>
                    <tr>
                         <th>limited</th>
                         <th><?=$row["limited"]?></th>
                    </tr>
                    <tr>
                         <th>valid</th>
                         <th><?=$row["valid"]?></th>
                    </tr>
                    
               </table>
              
               <div class="py-2">
                    <!-- <a class="btn btn-info text-white"
                     href="form-post-edit.php?id=<?=$row["id"]?>">編輯</a> -->
                     <!-- <a class="btn btn-danger" 
                     href="?id=<?=$row["id"]?>">刪除</a> -->
               </div>
          </div>
       </div>
  </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>