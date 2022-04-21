<form action="../api/comment/post.php" method="POST">
    <!-- 普通欄位 -->
    <div class="mb-3">
        <label for="user_id" class="form-label">user id</label>
        <input type="text" class="form-control" name="userId" id="user_id" placeholder="輸入" required>
    </div>
    <div class="mb-3">
        <label for="product_id" class="form-label">product id</label>
        <input type="text" class="form-control" name="productId" id="product_id" placeholder="輸入" required>
    </div>
    <div class="mb-3">
        <label for="score" class="form-label">score</label>
        <input type="number" class="form-control" name="score" id="score" placeholder="輸入" required>
    </div>

    <!-- 文字方塊 -->
    <div class="mb-3">
        <label for="text1" class="form-label">評論</label>
        <textarea class="form-control" name="content" id="text1" rows="3" placeholder="輸入" required></textarea>
    </div>

    <!-- 送出按鈕 -->
    <div class="text-center">
        <button type="submit" id="submit" class="btn btn-secondary btn-lg ">submit</button>
    </div>
</form>