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
// AUTO_INCREMENT重新計算
// alter table tablename AUTO_INCREMENT=1; 
let contentList = [
    "五星好評",
    "66666666",
    "現主時刷一整排愛心，漢堡",
    "我吃了以後考試都考一百分",
    "早上好中国，现在我有冰激淋，我很喜欢冰激淋",
    "我前女友吃了以後跟我復合了",
    "好吃新奇又好玩!",
];
let content = [];
let user = [];
let score = [];
let product = [];

randomNum(user, 200, 40);
randomNum(product, 200, 100);
randomNum(score, 200, 5);
randomContent(content, 200, 7);

function randomNum(arr, range, max) {
    for (let i = 0; i < range; i++) {
        arr.push(Math.ceil(Math.random() * max));
    }
    return arr;
}

function randomContent(arr, range, max) {
    for (let i = 0; i < range; i++) {
        arr.push(contentList[Math.floor(Math.random() * max)]);
    }
    return arr;
}
let keys = ["userId", "productId", "content", "score"];

// 宣告 目標網址
let url = "http://localhost:8080/project/api/comment/post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, user, product, content, score) //keys 順序對應 value 的放入順序
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