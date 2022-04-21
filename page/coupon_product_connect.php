<!doctype html>
<html lang="en">

<head>
     <title>

     </title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name=</head>

<body>
     <form action="">
          <select name="id_type" class="form-select" aria-label="Default select example">
               <option value="product_id">商品 ID</option>
               <option value="coupon_id">Coupon ID</option>
          </select>
          <div class="col-auto">
               <input type="number" class="form-control" name="id" value="<?= $id ?>">
          </div>
          <div class="col-auto">
               <button type="submit" class="btn btn-info text-white">篩選</button>
          </div>

          <div class="col-auto">
               <a class="btn btn-info text-white" href="http://localhost:8080/coupon_valid_product/form-post2-test.php">重新篩選</a>
          </div>
     </form>

     <?php echo $title ?>
     <table class="table">
          <thead>
               <tr>
                    <td>id</td>
                    <td>product id</td>
                    <td>coupon id</td>
                    <td></td>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($rows as $row) : ?>
                    <tr>
                         <td><?= $row["id"] ?></td>
                         <td><?= $row["product_id"] ?></td>
                         <td><?= $row["coupon_id"] ?></td>
                         <td>
                              <a class="btn btn-danger" href="deleteByIdCoupon.php?id=<?= $row["id"] ?>">刪除</a>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>

     </div>
     <!-- Bootstrap JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>