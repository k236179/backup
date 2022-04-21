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
let keys = ["name", "code", "discount", "startY", "startM", "startD", "startH", "endY", "endM", "endD", "endH",
    "limited "
]; //example
//
// 宣告 欲送出的 [value]
let name = ["coupon1", "coupon2", "coupon3", "coupon4", "coupon5", "coupon6", "coupon7", "coupon8", "coupon9",
    "coupon10", "coupon11", "coupon12", "coupon13", "coupon14", "coupon15"
]; //example
let code = ["001", "002", "003", "004", "005", "006", "007", "008", "009", "010", "011", "012", "013", "014",
    "015"
]; //example
let discount = ["40", "20", "10", "40", "15", "18", "85", "64", "75", "42", "12", "74", "45", "35", "10"]; //example
let startY = ["2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022", "2022",
    "2022", "2022"
]; //example
let startM = [03, 02, 10, 03, 02, 10, 03, 02, 10, 03, 02, 10, 03, 02, 10]; //example
let startD = [25, 17, 13, 25, 17, 13, 25, 17, 13, 25, 17, 13, 25, 17, 13]; //example
let startH = [16, 17, 05, 16, 17, 05, 16, 17, 05, 16, 17, 05, 16, 17, 05]; //example
let endY = [2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022, 2022]; //example
let endM = [04, 12, 01, 04, 12, 01, 04, 12, 01, 04, 12, 01, 04, 12, 01]; //example
let endD = [07, 25, 14, 07, 25, 14, 07, 25, 14, 07, 25, 14, 07, 25, 14]; //example1
let endH = [16, 08, 16, 16, 08, 16, 16, 08, 16, 16, 08, 16, 16, 08, 16]; //example
let limited = [10, 49, 16, 10, 49, 16, 10, 49, 16, 10, 49, 16, 10, 49, 16]; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/coupon/post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, name, code, discount, startY, startM, startD, startH, endY, endM, endD, endH,
        limited) //keys 順序對應 value 的放入順序
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