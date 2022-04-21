<div class="p-3">
    <!-- 表單 -->
    <form action="../api/coupon_valid_product/post.php" method="POST">
        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="product_id" class="form-label">商品ID</label>
            <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
            <input type="number" class="form-control" name="product_id" id="product_id" placeholder="輸入">
        </div>
        <div class="mb-3">
            <label for="coupon_id" class="form-label">優惠券ID</label>
            <input type="number" class="form-control" name="coupon_id" id="coupon_id" placeholder="輸入">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
        </div>
    </form>
</div>