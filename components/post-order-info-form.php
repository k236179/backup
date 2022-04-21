<div class="form  p-3">
    <!-- 表單 -->
    <form action="../api/order_info/post.php" method="post">
        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">使用者名稱</label>
            <input type="text" class="form-control" name="user" id="user" placeholder="輸入使用者名稱">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">優惠券</label>
            <input type="text" class="form-control" name="coupon" id="coupon" placeholder="輸入優惠券">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">配送方法</label>
            <input type="text" class="form-control" name="delivery" id="delivery" placeholder="輸入配送方法">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">收件人</label>
            <input type="text" class="form-control" name="receipent" id="receipent" placeholder="輸入收件人">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">配送地址</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="輸入配送地址">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">付款方式</label>
            <input type="text" class="form-control" name="pay" id="pay" placeholder="輸入付款方式">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">配送狀態</label>
            <input type="text" class="form-control" name="status" id="status" placeholder="輸入配送狀態">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="" class="form-label">截止日期</label>
            <input type="text" class="form-control" name="deadline" id="deadline" placeholder="輸入截止日期">
        </div>

        <!-- 送出按鈕 -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
        </div>
    </form>

</div>