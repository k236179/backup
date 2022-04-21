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
let keys = ["id", "name", "price", "description", "date", "duration", "valid"]; //example
//
// 宣告 欲送出的 [value]
let id = [1, 2, 3, 4, 5]; //example
let name = ["香草青蘋果蛋糕", "肉桂捲", "咖啡捲", "歌劇院蛋糕及黑櫻桃威士忌蛋糕", "生乳捲"]; //example
let price = [2800, 1800, 1800, 3600, 2400];
let description = ["課程中可以實作風靡全世界的圓形夾層蛋糕-德國攝政王蛋糕，和最不容易失敗的常溫蛋糕-香草青蘋果蛋糕，對於甜點想要精進的您是不可錯過的課程。",
    "近期最夯的麵包，撲鼻而來的肉桂香味加上糖粉及糖霜，入口時散發出黑糖融合肉桂及細砂糖的香氣，讓人難以拒絕。", "製作咖啡麵包捲，麵包組織鬆軟，夾層中間撒上咖啡粉，讓學員在家也可以簡單就超夯麵包。",
    "課程中可以實作兩款蛋糕，咖啡香氣夾帶巧克力口味的歌劇院蛋糕，以及威士忌酒香搭配酒釀櫻桃濃醇口感的黑櫻桃威士忌蛋糕，對於甜點想要精進的您是不可錯過的課程。",
    "程中可以實作柔軟Q彈的生乳捲，和使用64%調溫巧克力製作而成，香醇入口即化開的古典巧克力蛋糕，對於甜點想要精進的您是不可錯過的課程。"
];
let date = [2022 - 04 - 28, 2022 - 05 - 18, 2022 - 05 - 16, 2022 - 05 - 12, 2022 - 06 - 14];
let duration = [2, 1.5, 2.5, 3.5, 2.5];
let valid = [1, 1, 1, 1, 1];




// 宣告 目標網址
let url = "http://localhost:8080/project/api/class/post.php"; //example


try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, id, name, price, description, date, duration, valid) //keys 順序對應 value 的放入順序
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