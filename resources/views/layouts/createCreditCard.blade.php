<div class="bg-gray"></div>
<div class="create_creadit_card">
    <h2 class="bold">Add New Card</h2>

    <form action="">
        @csrf
        <div class="input_field_card">
            <label for="" class="font_gray sml">Card Number*</label><br>
            <input type="text" placeholder="0000 0000 0000 0000" class="credit_input js_credit_number" maxlength="19">
        </div>
        <div class="input_field_card_area">
            <div class="input_field_card2">
                <label for="" class="font_gray sml">CVV*</label><br>
                <input type="text" placeholder="000" class="credit_input" maxlength="3">
            </div>
            <div class="input_field_card2">
                <label for="" class="font_gray sml ">Expiry Date*</label><br>
                <input type="text" placeholder="MM/YY" class="credit_input js_expiryDate" maxlength="5">
            </div>
            <div class="input_field_card2" style="width: 100%;">
                <label for="" class="font_gray sml">Name on the Card*</label><br>
                <input type="text" placeholder="Enter name" class="credit_input">
            </div>
        </div>
        <div class="button_area">
            <div class="cancel_btn"><button >Cancel</button></div>
            <div class="create_btn"><button type="submit">Add card</button></div>
        </div>
    </form>
</div>