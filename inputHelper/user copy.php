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
let keys = ["name", "account", "password", "gender", "birthday", "phone", "photo"]; //example
//
// 宣告 欲送出的 [value]
let name = ["陳冠廷", "陳冠宇", "陳宗翰", "陳家豪", "陳彥廷", "陳承翰", "陳柏翰", "陳宇軒", "陳家瑋", "陳冠霖", "陳雅婷", "陳雅筑",
    "陳怡君", "陳佳穎", "陳怡萱", "陳宜庭", "陳郁婷", "陳怡婷", "陳詩涵", "陳鈺婷", "林冠廷", "林冠宇", "林宗翰", "林家豪", "林彥廷", "林承翰", "林柏翰", "林宇軒", "林家瑋", "林冠霖", "林雅婷", "林雅筑",
    "林怡君", "林佳穎", "林怡萱", "林宜庭", "林郁婷", "林怡婷", "林詩涵", "林鈺婷"
]; //example
let account = ["leo1@example.com", "joe2@example.com", "rose3@example.com", "angle4@example.com", "sam5@example.com", "kelly6@example.com", "ken7@example.com", "jake8@example.com", "hal9@example.com", "zoe10@example.com",
    "lucy11@example.com", "mary12@example.com", "karen13@example.com", "josie14@example.com", "abel15@example.com", "adolf16@example.com", "basil17@example.com", "annie18@example.com", "curt19@example.com", "cheryl20@example.com",
    "cindy21@example.com", "diane22@example.com", "ellie23@example.com", "frieda24@example.com", "una25@example.com", "angus26@example.com", "arthur27@example.com", "barry28@example.com", "caesa29@example.com", "clark30@example.com",
    "donna31@example.com", "dorothy32@example.com", "dolly33@example.com", "judy34@example.com", "kimberly35@example.com", "don36@example.com", "david37@example.com", "dale38@example.com", "ed39@example.com", "nicholas40@example.com"
]; //example
let password = ["password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123",
    "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123",
    "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123", "password123"
]; //example
let gender = ["0", "0", "1", "1", "0", "1", "0", "0", "0", "1", "1", "1", "1", "1", "0", "0", "0", "1", "0", "1", "1",
    "1",
    "1", "1", "1", "0", "0", "0", "0", "0", "1", "1", "1", "1", "1", "0", "0", "0", "0", "0"
]; //example
let birthday = ["1996-08-01", "1995-07-01", "2000-01-01", "1997-08-02", "1998-09-01", "1999-10-10",
    "1999-02-28", "2001-03-15", "2001-05-25", "2002-11-03", "2010-03-30", "2015-11-19", "1999-07-20", "2019-09-09",
    "2016-06-06", "2011-07-31", "2019-04-08", "2014-09-21", "2001-06-29", "1999-08-06", "2019-12-15", "2016-07-20",
    "2017-05-11", "2013-01-26", "2017-02-19", "2012-02-17", "2001-09-19", "2007-06-05", "2002-10-23", "2009-09-23",
    "2011-04-13", "2018-12-11", "2008-11-24", "2006-07-17", "2003-08-15", "2004-03-06", "2009-07-28", "2008-07-06",
    "2008-06-01", "2001-11-01"
]; //example
let phone = ["0900000000", "0999999999", "0911123111", "0911222333", "0911333444", "0933444555", "0911111222",
    "0911222334", "0911222336", "0911222987", "0922123456", "0922987654", "0933321456", "0911321321", "0912123123",
    "0911987987", "0911456456", "0911741741", "090012345", "090045678", "0900789123", "0900741852", "0900321963",
    "0900852123", "0900965874", "0922123456", "0922123789", "0922123741", "0922000123", "0955123123", "0955456456",
    "0955789789", "0955000000", "0955000123", "0955000456", "0966123123", "0966456456", "0955000789", "0977987654",
    "0988852963"
]; //example
let photo = ["user001.jpg", "user001.jpg", "user009.jpg", "user010.jpg", "user001.jpg", "user002.jpg", "user002.jpg",
    "user011.jpg", "user002.jpg",
    "user002.jpg", "user003.jpg", "user003.jpg", "user003.jpg", "user003.jpg", "user003.jpg", "user004.jpg",
    "user004.jpg", "user004.jpg",
    "user011.jpg", "user012.jpg", "user012.jpg", "user013.jpg", "user013.jpg", "user014.jpg", "user014.jpg",
    "user014.jpg",
    "user014.jpg",
    "user004.jpg", "user005.jpg", "user005.jpg", "user005.jpg", "user006.jpg", "user006.jpg", "user006.jpg",
    "user007.jpg", "user007.jpg",
    "user007.jpg", "user008.jpg", "user008.jpg", "user009.jpg"
]; //example
//
// 宣告 目標網址
let url = "http://localhost:8080/project/api/user/post.php"; //example

try {
    // 依序放入宣告完的變數 
    multiInput(url, keys, name, account, password, gender, birthday, phone, photo) //keys 順序對應 value 的放入順序
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