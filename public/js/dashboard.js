/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
{
  var calenderBtn_left = document.querySelector(".js_calenderBtn_left");
  var calenderBtn_right = document.querySelector(".js_calenderBtn_right");
  var calender_date = document.querySelector(".js_calender_date");
  var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  // // カレンダーで前の月を表示する場合
  calenderBtn_left.addEventListener("click", function () {
    var date = new Date(calender_date.innerHTML);
    date.setMonth(date.getMonth() - 1);
    var nextMonth = monthNames[date.getMonth()];
    var year = date.getFullYear();
    calender_date.innerHTML = "".concat(nextMonth, " ").concat(year);
    fetchTotalAmountBySelectedDate(year, nextMonth);
  });
  // カレンダーで次の月を表示する場合
  calenderBtn_right.addEventListener("click", function () {
    var date = new Date(calender_date.innerHTML);
    date.setMonth(date.getMonth() + 1);
    var nextMonth = monthNames[date.getMonth()];
    var year = date.getFullYear();
    calender_date.innerHTML = "".concat(nextMonth, " ").concat(year);
    fetchTotalAmountBySelectedDate(year, nextMonth);
  });
}

// カレンダーの日付を元にトータルを計算して返す関数
var fetchTotalAmountBySelectedDate = function fetchTotalAmountBySelectedDate(year, month) {
  fetch('/data', {
    // POSTリクエストのURLとオプションを指定
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // CSRFトークンをヘッダーに含める
    },
    body: JSON.stringify({
      year: year,
      month: month
    }) // サーバーに送るデータ
  }).then(function (response) {
    if (!response.ok) {
      throw new Error("サーバーエラーが発生しました。");
    }
    return response.json();
  }).then(function (data) {
    document.querySelector(".js_total_revenue").innerHTML = "\uFFE5".concat(data["totalRevenue"].toLocaleString('en-US'));
    document.querySelector(".js_total_expense").innerHTML = "\uFFE5".concat(data["totalExpense"].toLocaleString('en-US'));
    document.querySelector(".js_total_profit").innerHTML = "\uFFE5".concat(data["totalProfit"].toLocaleString('en-US'));
  })["catch"](function (error) {
    console.error('Error:', error);
  });
};
/******/ })()
;