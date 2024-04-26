window.$ = window.jQuery = require('jquery');
require('jquery-ui/ui/widgets/datepicker');  // Datepickerモジュールの明示的なインポート
require('slick-carousel/slick/slick'); // slickのインポート

$(document).ready(function() {
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd' // 日付のフォーマットを設定
    });
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
    });
});





// financialカテゴリの選択

const financial_type_select = document.querySelector(".js_financial_categories")
financial_type_select.addEventListener("input", (e)=>{
    let category_id = e.target.value
    // fetch('/data', {  // POSTリクエストのURLとオプションを指定
    //     method: "POST",
    //     headers: {
    //         "Content-Type": "application/json",
    //         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // CSRFトークンをヘッダーに含める
    //     },
    //     body: JSON.stringify({ category_id: category_id })  // サーバーに送るデータ
    // })
    // .then(response => {
    //     if (!response.ok) {
    //         throw new Error("サーバーエラーが発生しました。");
    //     }
    //     return response.json();
    // })
    // .then(data => {
    //     console.log(data);  // レスポンスデータの処理
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    // });
    
})


