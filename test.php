SELECT * FROM order_info, order_item WHERE order_info.id = order_item.order_info;

SELECT order_item.*,order_info.*
FROM order_item,product,order_info
WHERE order_item.product = product.id
AND order_info.id = order_item.order_info;


SELECT order_item.*, product.name, product.price FROM order_item, order_info, product WHERE order_item.order_info=order_info.id AND order_item.product = product.id AND product = 3;


<!-- what i want -->

SELECT order_item.counter,order_item.memo , lessons.name, lessons.price, product.name, product.price, order_info.address, order_info.create_time, order_info.receipent,order_info.coupon, user.name, coupon.discount FROM order_item, lessons, product, order_info, user, coupon WHERE order_item.product = product.id AND order_item.class = lessons.id AND order_item.order_info = order_info.id AND order_info.user = user.id AND order_info.coupon = coupon.id;

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">USER</th>
            <th scope="col">COUPON</th>
            <th scope="col">CREATE TIME</th>
            <th scope="col">DELIVERY</th>
            <th scope="col">RECEIPENT</th>
            <th scope="col">PAY</th>
            <th scope="col">STATUS</th>
            <th scope="col">VALID</th>
            <th scope="col">DEADLINE</th>
            <th scope="col">ADDRESS</th>


            <th scope="col"><?php
                            $title = "新增訂單商品";
                            $formType = "post-order-item";
                            require_once("../components/post-offcanvas.php") ?></th>
                            <th><a href="../page/index.php?current=order-item&order_info=" class="btn btn-secondary">回列表</a></th> 
        </tr>
    </thead>
    <tbody>
        <?php if ($joinRows > 0) : ?>
        <?php foreach ($joinRows as $row) : ?>
        <tr>
           
            <th scope="row"><?= $row["id"] ?></th>
            <td><?= $row["user"] ?></td>
            <td> <?= $row["coupon"] ?></a> </td>
            <td><?= $row["create_time"] ?></td>
            <td><?= $row["delivery"] ?></td>
            <td><?= $row["receipent"] ?></td>
            <td><?= $row["pay"] ?></td>
            <td><?= $row["status"] ?></td>
            <td><?= $row["valid"] ?></td>
            <td><?= $row["deadline"] ?></td>
            <td><?= $row["address"] ?></td>
            <td><a class="btn btn-secondary" href="../components/edit_order_item.php?id=<?= $row["id"] ?>">編輯</a> </td>
            <td><a class="btn btn-danger" href="../components/delete_order_item.php?id=<?= $row["id"] ?>" >刪除</a> </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>