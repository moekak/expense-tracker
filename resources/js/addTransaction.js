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
const financial_categories = document.querySelectorAll(".js_transaction_categoty")
const select_btn = document.querySelector(".js_select_financialCategory")

financial_type_select.addEventListener("input", (e)=>{
    let category_id = e.target.value
    select_btn.disabled = false
    financial_categories.forEach((category)=>{
        category.selected = false
        document.querySelector(".default_option").selected = true
        console.log(category.selected);
        if(category.getAttribute("data-id") == category_id){
            category.style.display = "block"
        }else{
            category.style.display = "none"
        }
    })  
})


