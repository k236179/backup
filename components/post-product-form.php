    <!-- 表單 -->
    <form action="../api/product/post.php" method="POST">
        <!-- 普通欄位 -->
        <div class="mb-3">
            <label for="name" class="form-label">商品名稱</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="商品名稱">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">價格
            </label>
            <input type="number" class="form-control" name="price" id="price" min="0" placeholder="商品價格">
        </div>
        <div class="mb-3">
            <label for="express" class="form-label">配送方式</label>
            <input type="number" class="form-control" name="express" id="express" min="0" max="2"
                placeholder="1:常溫, 2:低溫, 0:不可配送">
        </div>
        <div class="mb-3">
            <label for="inventory" class="form-label">庫存</label>
            <input type="number" class="form-control" name="inventory" id="inventory" min="0" placeholder="商品庫存">
        </div>
        <div class="mb-3">
            <label for="launched" class="form-label">上/下架</label>
            <input type="number" class="form-control" name="launched" id="launched" min="0" max="1"
                placeholder="1:上架, 0:下架">
        </div>

        <!-- 文字方塊 -->
        <div class="mb-3">
            <label for="description" class="form-label">產品說明</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="產品說明文字"></textarea>
        </div>

        <!-- 圖片上傳 -->
        <div class="mb-3">
            <label for="images" class="form-label">商品圖片</label>
            <input type="file" class="form-control" name="images" id="images">
        </div>

        <!-- 送出按鈕 -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
        </div>
    </form>