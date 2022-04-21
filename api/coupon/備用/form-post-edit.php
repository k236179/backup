<?php
if(!isset($_GET["id"])){
     header("location: 404.php");

}


$id=$_GET["id"];
// 透過網址可以提出不同的資料
require_once("./project-conn.php");

$sql="SELECT * FROM coupon WHERE id='$id' ";

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
          <form action="blockListById.php" method="POST">
               <table class="table table-bordered">
                    <input type="hidden"name="id" value="<?=$row["id"]?>" > 
                    <tr>
                         <th>id</th>
                         <td><?=$row["id"]?></td>
                    </tr>
                    <tr>
                         <th>name</th>
                         <td><input class="form-control" 
                         type="text" name="name" value="<?=$row["name"]?>"></td>
                    </tr>
                    <tr>
                         <th>code</th>
                         <td><input class="form-control" 
                         type="text" name="code" value="<?=$row["code"]?>"></td>
                    </tr>
                    <tr>
                         <th>discount</th>
                         <td><input class="form-control" 
                         type="" name="discount" value="<?=$row["discount"]?>"></td>
                    </tr>
                    <tr>
                         <th>expiry</th>
                         <td><input class="form-control" 
                         type="" name="expiry" value="<?=$row["expiry"]?>"></td>
                    </tr>
                    <tr>
                         <th>limited</th>
                         <td><input class="form-control" 
                         type="" name="limited" value="<?=$row["limited"]?>"></td>
                    </tr>
                    <tr>
                         <th>valid</th>
                         <td><input class="form-control" 
                         type="" name="valid" value="<?=$row["valid"]?>"></td>
                    </tr>
                    
               </table>
               <div class="py-2">
                  
                    <button type="submit"
                    class="btn btn-info text-white">儲存</button>
                    </button>
                    <a class="btn btn-info text-white" 
                    href="form-post.php?id=<?=$row["id"]?>">取消</a>
                   
               </div>
          </form>
          </div>
       </div>
  </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>