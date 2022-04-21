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
let keys = ["coupon_id", "product_id"]; //example
//
// 宣告 欲送出的 [value]
let product_id = [11, 12, 7, 17, 14, 2, 15, 12, 2, 5, 18, 8, 1, 10, 4, 8, 18, 15, 7, 12, 9, 2, 2, 7, 10, 13, 8, 12, 8,
    19, 3, 19, 12, 4, 1, 15, 4, 14, 18, 12, 12, 1, 15, 7, 20, 6, 7, 11, 2, 5, 19, 14, 18, 3, 2, 17, 9, 3, 20, 10, 6,
    11, 14, 2, 5, 1, 2, 11, 3, 12, 11, 13, 18, 20, 9, 2, 13, 13, 7, 9, 2, 3, 5, 20, 10, 16, 7, 10, 7, 4, 4, 3, 20,
    6, 8, 14, 9, 8, 11, 15
]; //example
let coupon_id = [2, 1, 4, 5, 1, 3, 3, 2, 2, 2, 1, 2, 4, 5, 3, 2, 1, 2, 2, 2, 5, 5, 1, 3, 2, 4, 3, 5, 5, 1, 5, 5, 2, 5,
    4, 2, 3, 5, 4, 5, 1, 4, 5, 5, 2, 3, 4, 4, 1, 2, 4, 3, 5, 3, 4, 2, 2, 1, 1, 5, 5, 5, 3, 5, 5, 4, 2, 2, 2, 3, 4,
    5, 2, 5, 2, 2, 4, 1, 4, 1, 3, 4, 3, 5, 2, 4, 4, 1, 5, 3, 3, 3, 3, 2, 4, 4, 1, 5, 4, 5
]; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/coupon_valid_product/post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, coupon_id, product_id) //keys 順序對應 value 的放入順序
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