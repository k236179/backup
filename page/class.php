<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

// if(!isset($_GET["p"])){
//     $p=1;
// }else{
//     $p=$_GET["p"];
// }

if(!isset($_GET["type"])){
  $type=5;
}else{
  $type=$_GET["type"];
}

switch($type){
    case"1":
       $order="price ASC";
       break;
    case"2":
       $order="price DESC";
       break;
    case"3":
       $order="duration ASC";
       break;
    case"4":
       $order="duration DESC";
       break;
    case"5":
        $order="id ASC";
        break;
     
    default:
       $order="id ASC";
  }
  
$sql = "SELECT * FROM lessons ORDER BY $order";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
?>
<h2>課程一覽</h2>
<!doctype html>
<html lang="en">
  <head>
    <title>class</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <div class="container">
            <div class="text-end">
              <a class="btn-sm btn-info text-white <?php if($type==1)echo "active" ?>" href="index.php?current=class&type=1">由價低至高</a>
              <a class="btn-sm btn-info text-white<?php if($type==2)echo "active" ?>" href="index.php?current=class&type=2">由價高至低</a>
              <a class="btn-sm btn-info text-white <?php if($type==3)echo "active" ?>" href="index.php?current=class&type=3">由時長短至長</a>
              <a class="btn-sm btn-info text-white <?php if($type==4)echo "active" ?>" href="index.php?current=class&type=4">由時長長至短</a>
            </div>
     </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
<table class="table table-striped table-hover my-3">
    <thead>
        <tr>
                <th>編號</th>
                <th><img style="width: 1.5rem;" src="../img/icon/user.png" alt="">課程名稱</th>
                <th><img style="width: 1.5rem;" src="../img/icon/credit-card.png" alt="">課程價格</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt="">課程簡介</th>
                <th><img style="width: 1.5rem;" src="../img/icon/calendar.png" alt="">課程日期</th>
                <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt="">課程時長</th>
                <th>Valid</th>
                <th scope="col"><?php
                            $title = "新增課程";
                            $formType = "post-class";
                            require("../components/post-offcanvas.php") ?></th>
            </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td class="description"><?= $row["description"] ?></td>
            <td><?= $row["date"] ?></td>
            <td><?= $row["duration"] ?> hours</td>
            <td><?= $row["valid"] ?></td>
            <td><a type="button" class="btn-sm btn-warning"  href="/project/api/class/edit_class.php?id=<?= $row["id"] ?>">編輯</a>
            <a type="button" class="btn-sm btn-danger" class="btn btn-danger text-white" href="/project/api/class/delete_class.php?id=<?= $row["id"] ?>">刪除</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</table>