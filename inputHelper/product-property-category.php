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
// 禮盒---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
let keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
let product_id = ["4", "1", "8", "2", "5", "7", "3"]; //example
let category_id = ["12", "12", "12", "12", "12", "12", "12"]; //example
//
// 宣告 目標網址
let url = "http://localhost/project/api/product/product-property-category-post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
} catch (e) {
    sayError(e);
};


// 禮盒---------------------------------------------------------------------------------
// 宣告 欲送出的 [key]
let keys = ["product_id", "category_id"]; //example
//
// 宣告 欲送出的 [value]
let product_id = ["4", "1", "8", "2", "5", "7", "3"]; //example
let category_id = ["11", "2", "2", "2", "6", "6", "7"]; //example
//
// 宣告 目標網址
let url = "http://localhost/project/api/product/product-property-category-post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, product_id, category_id) //keys 順序對應 value 的放入順序
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
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應: \n ${JSON.stringify(res)}\n
                    ----------------------`
            },
            error: function(err) {
                info.innerText +=
                    `\n\n POST資料: \n ${JSON.stringify(body)} \n回應:  \n ${JSON.stringify(err)}\n
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