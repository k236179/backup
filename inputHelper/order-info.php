<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會塞資料的小精靈</title>
    <style>
    body {
        width: 50vw;
        word-wrap: break-word;
        line-height: 1.5rem;
        margin: 3rem auto;
    }
    </style>
</head>

<body>
    <p id="info"></p>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
// 宣告 欲送出的 [key]
let keys = ["user", "coupon", "delivery", "receipent", "address", "pay", "status", "valid", "deadline"]; //example
//
// 宣告 欲送出的 [value]
let userValue = ["1", "2", '3', '4', '5', '6', '7', '8', '9', '10']; //example
let couponValue = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; //example
let deliveryValue = ['mail', 'store', 'mail', 'store', 'mail', 'store', 'mail', 'store', 'mail', 'mail']; //example
let receipentValue = ['coco', 'emily', 'michael', 'john', 'tim', 'justin', 'camille', 'janny', 'katrina', 'rick']; //example
let addressValue = ['taipei', 'tauyuan', 'kenting', 'taipei', 'tauyuan', 'kenting', 'taipei', 'tauyuan', 'kenting', 'taipei']; //example
let payValue = ['cash', 'credit card','cash', 'credit card','cash', 'credit card','cash', 'credit card','cash', 'credit card']; //example
let statusValue = ['received', 'received', 'received', 'received', 'received', 'received', 'received', 'received','received','received']; //example
let validValue = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]; //example
let deadlineValue = ['1', '9', '8', '7', '6', '5', '3', '2', '1', '5']; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/order_info/post.php"; //example


try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, userValue, couponValue, deliveryValue, receipentValue, addressValue, payValue, statusValue,
        validValue, deadlineValue) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};







function multiInput(url, keys, ...arrs) {
    let size = arrs[0].length;
    info.innerText = "小精靈開示了 : "
    if (url == "http://localhost:8080/myPostApi.php") {
        throw "改一下變數麻";
    }
    arrs.forEach(arr => {
        if (arr.length != size) {
            info.innerText += `\n\n 標準長度是 ${size}\n第 ${arrs.indexOf(arr)+1} 個陣列長度是 ${arr.length} `;
            throw "長度怪怪的ㄛ";
        }
    })
    for (let i = 0; i < arrs[0].length; i++) {
        let body = {};
        for (let j = 0; j < keys.length; j++) {
            let arr = arrs[j]
            body[keys[j]] = arr[i];
        }
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: body,
            success: function(res) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應: \n ${JSON.stringify(res.responseText)}\n
                    ----------------------`
            },
            error: function(err) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應:  \n ${JSON.stringify(err.responseText)}\n
                    ----------------------`
            },
        });
    }
}

function sayError(e) {
    info.innerText += "\n";
    info.innerText += e;

}
</script>

</html>