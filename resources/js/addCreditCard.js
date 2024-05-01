const credit_number = document.querySelector(".js_credit_number")
credit_number.addEventListener("input", (e)=>{
    let inputValue = e.target.value.replace(/\s+/g, '');
    let formattedInput = ""


    for(let i = 0; i < inputValue.length; i ++){

        if(i > 0 && i % 4 === 0){

            console.log("222");
            formattedInput += ' '
        }
        formattedInput += inputValue[i]
    }

    e.target.value = formattedInput


    console.log(e.target.value.length);
    
})


const expiryDate = document.querySelector(".js_expiryDate")
let checkValue = {
    "hasValue" : false
}

expiryDate.addEventListener("input", (e)=>{

    let inputValue = e.target.value.replace(/\s+/g, '')
    if(inputValue.length == 0){
        checkValue["hasValue"] = false
    }
     if(!checkValue["hasValue"] && inputValue.length == 2){
        expiryDate.value += "/"
        checkValue["hasValue"] = true
     }


})