<!-- 表單 -->
<form action="../api/class/post_class.php" method="POST">
            <div class="mb-2">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="mb-2">
                <label for="price">Price</label>
                <input type="price" id="price" class="form-control" name="price" required>
            </div>
            <div class="mb-2">
                <label for="description">Description</label>
                    <input type="text" id="description" class="form-control" name="description" >
            </div>
            <div class="mb-2">
                <label for="date">Date</label>
                <input type="date" id="date" class="form-control" name="date" required>
            </div>
            <div class="mb-2">
                <label for="duration">duration</label>
                    <input type="" id="duration" class="form-control" name="duration" >
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

</div>