<!-- 表單 -->
<form action="../api/coupon/post.php" method="POST">
    <!-- 普通欄位 -->
    <div class="mb-3">
        <label for="inpit1" class="form-label">name</label>
        <!-- label for 的功能 點標題字就可以到那格的輸入空格中 -->
        <input type="text" class="form-control" name="name" id="name" placeholder="輸入">
    </div>
    <div class="mb-3">
        <label for="inpit1" class="form-label">code</label>
        <input type="text" class="form-control" name="code" id="code" placeholder="輸入">
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">discount折扣</label>
        <input type="text" class="form-control" name="discount" id="discount" placeholder="%記得換算">
    </div>

    <div class="mb-2">
        <label for="inpit1">expiry</label>
        <div class="row">
            <div class="col">
                <input type="date" name="date1">
            </div>
            <!-- <div class="col">
                <input type="text" id="startY" class="form-control" name="startY" placeholder="YYYY" required>年
            </div>
            <div class="col">
                <input type="text" id="startY" class="form-control" name="startM" placeholder="MM" required>月
            </div>
            <div class="col">
                <input type="text" id="startY" class="form-control" name="startD" placeholder="DD" required>日
            </div> -->
            <div class="col">
                <input type="text" id="startY" value="12:00" class="form-control d-none" name="startH">
            </div>

            <div class="row">
                <div class="col">
                    <input type="date" name="date2">
                </div>
                <!-- <div class="col">
                    <input type="text" id="endY" class="form-control" name="endY" placeholder="YYYY" required>年
                </div>
                <div class="col">
                    <input type="text" id="endM" class="form-control" name="endM" placeholder="MM" required>月
                </div>
                <div class="col">
                    <input type="text" id="endD" class="form-control" name="endD" placeholder="DD" required>日
                </div> -->
                <div class="col">
                    <input type="text" id="endH" value="12:00" class="form-control d-none" name="endH">
                </div>

                <div class="mb-3">
                    <label for="inpit1" class="form-label">litmited</label>
                    <input type="text" class="form-control" name="limited" id="limited" placeholder="輸入">
                </div>



                <!-- 送出按鈕 -->
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary btn-lg ">submit</button>
                </div>
</form>