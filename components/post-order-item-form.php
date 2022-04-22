<div class="form p-3">
    <!-- 表單 -->
    <form action="../api/order_item/post.php" method="post">
        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="inpit1" class="form-label">產品名稱</label>
            <input type="text" class="form-control" name="product" id="product" placeholder="請輸入產品名稱">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="inpit1" class="form-label">產品資訊</label>
            <input type="text" class="form-control" name="order_info" id="order_info" placeholder="請輸入產品資訊">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="inpit1" class="form-label">課程名稱</label>
            <input type="text" class="form-control" name="class" id="class" placeholder="請輸入課程名稱">
        </div>

        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="inpit1" class="form-label">數量</label>
            <input type="text" class="form-control" name="counter" id="counter" placeholder="請輸入數量">
        </div>


        <!-- 文字方塊 -->
        <div class="mb-3">
            <label for="text1" class="form-label">備註</label>
            <textarea class="form-control" name="memo" id="memo" rows="3" placeholder="請輸入備註"></textarea>
        </div>

        <!-- 送出按鈕 -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
        </div>
    </form>

</div>