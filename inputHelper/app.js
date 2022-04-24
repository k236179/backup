let keys = ["user", "product", "content", "score"];

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
randomContent(content, 50, 7);
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
