{
    const calenderBtn_left = document.querySelector(".js_calenderBtn_left")
    const calenderBtn_right = document.querySelector(".js_calenderBtn_right")
    const calender_date = document.querySelector(".js_calender_date")
    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];


    // // カレンダーで前の月を表示する場合
    calenderBtn_left.addEventListener("click", ()=>{
        const date  = new Date(calender_date.innerHTML)
        date.setMonth(date.getMonth() -1)
        
        let nextMonth = monthNames[date.getMonth()]
        let year = date.getFullYear()

        calender_date.innerHTML = `${nextMonth} ${year}`

        fetchTotalAmountBySelectedDate(year, nextMonth)
    })
    // カレンダーで次の月を表示する場合
    calenderBtn_right.addEventListener("click", ()=>{
        const date  = new Date(calender_date.innerHTML)

        date.setMonth(date.getMonth() + 1)

        let nextMonth = monthNames[date.getMonth()]
        let year = date.getFullYear()

        calender_date.innerHTML = `${nextMonth} ${year}`

        fetchTotalAmountBySelectedDate(year, nextMonth)
    })
}


// カレンダーの日付を元にトータルを計算して返す関数
const fetchTotalAmountBySelectedDate = (year, month) =>{
    fetch('/data', {  // POSTリクエストのURLとオプションを指定
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // CSRFトークンをヘッダーに含める
        },
        body: JSON.stringify({ year: year, month: month })  // サーバーに送るデータ
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("サーバーエラーが発生しました。");
        }
        return response.json();
    })
    .then(data => {
        document.querySelector(".js_total_revenue").innerHTML = `￥${data["totalRevenue"].toLocaleString('en-US')}`
        document.querySelector(".js_total_expense").innerHTML = `￥${data["totalExpense"].toLocaleString('en-US')}`
        document.querySelector(".js_total_profit").innerHTML = `￥${data["totalProfit"].toLocaleString('en-US')}`
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
    
        





