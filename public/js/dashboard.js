/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
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
});
// カレンダーで次の月を表示する場合
calenderBtn_right.addEventListener("click", function () {
  var date = new Date(calender_date.innerHTML);
  date.setMonth(date.getMonth() + 1);
  var nextMonth = monthNames[date.getMonth()];
  var year = date.getFullYear();
  calender_date.innerHTML = "".concat(nextMonth, " ").concat(year);
});
{}
/******/ })()
;