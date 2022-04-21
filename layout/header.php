<?php
$list = array("商品", "課程", "會員", "訂單", "優惠券");
$listEn = array("product", "class", "user", "order-info", "coupon");
?>

<nav class="navbar navbar-light px-5 pt-3 pb-0 " style="background-color: #e3f2fd;">
    <div class="container-fluid">

        <h1>FEE25後台管理</h1>

        <!-- 搜索 -->
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- 導覽列 -->
        <div class="w-100 text-center d-flex justify-content-center">
            <ul class="nav nav-tabs">
                <?php $i = 0; ?>
                <?php foreach ($list as $link) : ?>
                <?php
                    if ($listEn["$i"] == $currentPage) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                    ?>
                <li class="nav-item">
                    <a class="nav-link <?= $active ?>" href="./index.php?current=<?= $listEn["$i"] ?>"><?= $link ?></a>
                </li>
                <?php $i++; ?>
                <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>