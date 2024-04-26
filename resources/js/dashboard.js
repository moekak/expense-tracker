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
})
// カレンダーで次の月を表示する場合
calenderBtn_right.addEventListener("click", ()=>{
    const date  = new Date(calender_date.innerHTML)

    date.setMonth(date.getMonth() + 1)

    let nextMonth = monthNames[date.getMonth()]
    let year = date.getFullYear()

    calender_date.innerHTML = `${nextMonth} ${year}`
})




{




    
}
