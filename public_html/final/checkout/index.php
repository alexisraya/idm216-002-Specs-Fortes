<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Checkout';
include_once __DIR__ . '/../../_components/header.php';
include_once __DIR__ . '/../../_components/order_header.php';

$cart = getAllCartItems($userOrder['id']);
?>

<?php
    $site_url = site_url();
    echo"
        <div class='top_nav'>
            <a class='back_button' href='{$site_url}/final/cart/index.php'>
                <img src='{$site_url}/../../_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>CHECKOUT</h1>
        </div>
    
        <div class='cart_form_container'>
        ";
    include_once __DIR__ . '/../../_components/cart_items.php';
    $subtotal = (float)$total;
    $subtotal_label = '$' . number_format($subtotal, 2);
    $tip = .15 * $subtotal;
    $tip_label = '$' . number_format($tip, 2);
    $total = $subtotal + $tip;
    $total_label = '$' . number_format($total, 2);
    echo"
        <div class='yellow_line'></div>
        <div class='tip_container'>
            <div class='tip_labels_container'>
                <h1 class='tip_title'>Tip:</h1>
                <h1 class='tip_price js-tip-price'>{$tip_label}<h1>
                <input type='hidden' name='tip' id='order_tip' value='{$tip}'>
            </div>
            <div class='tip_btns'>
                <button class='tip_btn start_tip js-tip-btn' type='button' value='0'>No Tip</button>
                <button class='tip_btn  tip_selected js-tip-btn' type='button' value='0.15'>15%</button>
                <button class='tip_btn js-tip-btn' type='button' value='0.18'>18%</button>
                <button class='tip_btn end_tip js-tip-btn' type='button' value='0.20'>20%</button>
            </div>
        </div>
        <div class='subtotal_container'>
            <h1 class='subtotal_title'>Total:</h1>
            <h1 class='subtotal_price js-subtotal-price'>{$total_label}<h1>
        </div>
    ";

    date_default_timezone_set("America/New_York");
    $current_hour = date("h");
    $current_minute = date("i");
    $meridian = date("a");

    $minute1 = $current_minute + 15;
    if ($minute1>60){
        $minute1 = $minute1 - 60;
        $hour1 = $current_hour + 1;
    } else {
        $hour1 = $current_hour;
    }

    $value1= $hour1 . ":" . $minute1 . " " . $meridian;

    $minute2 = $current_minute + 30;
    if ($minute2>60){
        $minute2 = $minute2 - 60;
        $hour2 = $current_hour + 1;
    } else {
        $hour2 = $current_hour;
    }

    $value2= $hour2 . ":" . $minute2 . " " . $meridian;

    $minute3 = $current_minute + 45;
    if ($minute3>60){
        $minute3 = $minute3 - 60;
        $hour3 = $current_hour + 1;
    } else {
        $hour3 = $current_hour;
    }

    $value3= $hour3 . ":" . $minute3 . " " . $meridian;

    $hour4 = $current_hour + 1;

    $value4= $hour4 . ":" . $current_minute . " " . $meridian;

    echo"
        <select name='pickup_time' class='pickup_time_select'>
                <option value='ASAP'>Pick-up Time: (ASAP)</option>
                <option value='{$value1}'>Pick-up Time: {$hour1}:{$minute1} {$meridian} (+15 min)</option>
                <option value='{$value2}'>Pick-up Time: {$hour2}:{$minute2} {$meridian} (+30 min)</option>
                <option value='{$value3}'>Pick-up Time: {$hour3}:{$minute3} {$meridian} (+45 min)</option>
                <option value='{$value4}'>Pick-up Time: {$hour4}:{$current_minute} {$meridian} (+1 hour)</option>
        </select>
        <input type='hidden' name='subtotal' id='order_subtotal' value='{$total}'>

        <div class='yellow_line'></div>
        ";

    if ($user['isGuest'] == 1){
        echo"
            <div class='order_signin_container'>
                <a class='order_signin_link' href='{$site_url}/login/index.php'>Sign in for Quick Checkout</a>
            </div>
        ";
    }
        $name = $user['name'];
        if ($name == NULL){
            $name = 'Guest';
        }
        $phone = $user['phone_number'];
        if ($phone == NULL){
            $phone = '123-456-7890';
        }
    echo"
        <div class='checkout_info_container'>
            <label for='order_name' class='order_name_label'>ORDER NAME</label>
            <input type='name'name='order_name' placeholder='Your Name' class='order_name_input' value='{$name}'>

            <label for='order_phone' class='order_phone_label'>TEXT NOTIFICATION</label>
            <input type='tel' name='order_phone' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'' placeholder='{$phone}' maxlength='10' class='order_phone_input'>
            <h3>PAYMENT METHODS</h3>
            <div class='payment_method_container'>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='venmo' id='venmo' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='venmo' class='venmo_icon payment_icon'>
                    <p>Venmo</p>
                </label>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='paypal' id='paypal' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='paypal' class='paypal_icon payment_icon'>
                    <p>Paypal</p>
                </label>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='apple pay' id='apple pay' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='apple pay' class='applepay_icon payment_icon'>
                    <p>Apple Pay</p>
                </label>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='google pay' id='google pay' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='google pay' class='googlepay_icon payment_icon'>
                    <p>Google Pay</p>
                </label>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='card' id='card' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='card' class='card_icon payment_icon'>
                    <p>Card</p>
                </label>
                <label class='payment_method'>
                    <input type='radio' name='payment_method' value='cash' id='cash' class='payment_method_input' checked>
                    <img src='https://via.placeholder.com/92x92' alt='cash' class='cash_icon payment_icon'>
                    <p>Pay at Truck</p>
                </label>
            </div>
            <div class='card_info_container hide' id='card_info_container'>
                <label for='card_number' class='card_number_label'>CARD NUMBER</label>
                <input type='text' name='card_number' placeholder='1234 5678 9012 3456' class='card_number_input'>

                <label for='card_name' class='card_name_label'>CARD NAME</label>
                <input type='text' name='card_name' placeholder='John Doe' class='card_name_input'>

                <label for='card_exp' class='card_exp_label'>EXPIRATION DATE</label>
                <input type='text' name='card_exp' placeholder='MM/YY' class='card_exp_input'>

                <label for='card_cvv' class='card_cvv_label'>CVV</label>
                <input type='text' name='card_cvv' placeholder='123' class='card_cvv_input'>
            </div>
        </div>

    ";
    include_once __DIR__ . '/../../_components/quick_add.php';
    echo" 
        <form class='cart_form' action='{$site_url}/_includes/checkout.php' method='POST'>
                <input type='hidden' name='this_order_id' value='{$userOrder['id']}'>
                <input type='hidden' name='total_price' id='total_price' value='{$total}'>
                <button type='submit' id='complete-order' class='button checkout_button'>CHECKOUT</button>
        </form>

        </div>
    ";
?>

<script>
    const plus_btns = document.querySelectorAll(".js-cart-plus");
    const minus_btns = document.querySelectorAll(".js-cart-minus");
    const quantity_values_text = document.querySelectorAll(".js-quantity-value-text");
    const quantity_values = document.querySelectorAll(".js-quantity-value"); // actual value in input
    const prices = document.querySelectorAll(".js-cart-item-price");

    const tipBtns = document.querySelectorAll(".js-tip-btn");
    let tip = parseFloat(document.querySelector(".js-tip-price").innerHTML.substring(1));
    let tip_label = document.querySelector(".js-tip-price");
    const tip_input = document.getElementById("order_tip");

    const subtotalInput = document.getElementById("order_subtotal");

    const subtotalObj = document.querySelector(".js-subtotal-price");
    let subtotal = parseFloat(subtotalObj.innerHTML.substring(1));

    const total_input = document.getElementById("total_price");

    function updateSubtotal(newSubtotal){
        subtotal = newSubtotal;
        subtotalObj.innerHTML = "$" + subtotal.toFixed(2);
        subtotalInput.setAttribute("value", subtotal);
    }

    function updateTip(percentage){
        subtotal -= tip;
        tip = percentage * subtotal;
        subtotal = subtotal + tip;
        subtotalObj.innerHTML = "$" + subtotal.toFixed(2);
        subtotalInput.setAttribute("value", subtotal);
        tip_label.innerHTML = "$" + tip.toFixed(2);
        total_input.setAttribute("value", subtotal);
    }

    tipBtns.forEach((tipBtn) => {
        tipBtn.addEventListener("click", (e) => {
            tipBtns.forEach((tipBtn) => {
                tipBtn.classList.remove("tip_selected");
            });
            tipBtn.classList.add("tip_selected");
            let percentage = parseFloat(tipBtn.value);
            updateTip(percentage);
            tip_input.setAttribute("value", tip);
        });
    });

    function add_quantity(btn, quantity_value_text, quantity_value, price){
        let quantity_value_ammount = parseInt(quantity_value_text.innerHTML);
        quantity_value_ammount+=1;
        quantity_value.setAttribute("value", quantity_value_ammount);
        quantity_value_text.innerHTML= quantity_value_ammount.toString();
        subtotal += price;
        updateSubtotal(subtotal);
    }
    function subtract_quantity(btn, quantity_value_text, quantity_value, price){
        let quantity_value_ammount = parseInt(quantity_value_text.innerHTML);
        if(quantity_value_ammount>1){
            quantity_value_ammount-=1;
            quantity_value.setAttribute("value", quantity_value_ammount);
            quantity_value_text.innerHTML= quantity_value_ammount.toString();
            subtotal -= price;
            updateSubtotal(subtotal);
        }
    }

    plus_btns.forEach((plus_btn) => {
        let label_id = plus_btn.id.substring(0,2);
        if (label_id.includes("-")){
            label_id = label_id.substring(0,1);
        }
        label_id = label_id + "-quantity-label";
        let matching_quantity_value_text = document.getElementById(label_id);

        let id = plus_btn.id.substring(0,2);
        if (id.includes("-")){
            id = id.substring(0,1);
        }
        id = id + "-quantity";
        let matching_quantity_value = document.getElementById(id);

        let price_id = plus_btn.id.substring(0,2);
        if (price_id.includes("-")){
            price_id = price_id.substring(0,1);
        }
        price_id = price_id + "-price";
        let matching_price = document.getElementById(price_id);
        matching_price = matching_price.innerHTML.substring(1);
        matching_price = parseFloat(matching_price);
        plus_btn.addEventListener("click", function () {
            add_quantity(plus_btn, matching_quantity_value_text, matching_quantity_value, matching_price);
        });
    });

    minus_btns.forEach((minus_btn) => {
        let label_id = minus_btn.id.substring(0,2);
        if (label_id.includes("-")){
            label_id = label_id.substring(0,1);
        }
        label_id = label_id + "-quantity-label";
        let matching_quantity_value_text = document.getElementById(label_id);

        let id = minus_btn.id.substring(0,2);
        if (id.includes("-")){
            id = id.substring(0,1);
        }
        id = id + "-quantity";
        let matching_quantity_value = document.getElementById(id);

        let price_id = minus_btn.id.substring(0,2);
        if (price_id.includes("-")){
            price_id = price_id.substring(0,1);
        }
        price_id = price_id + "-price";
        let matching_price = document.getElementById(price_id);
        matching_price = matching_price.innerHTML.substring(1);
        matching_price = parseFloat(matching_price);

        minus_btn.addEventListener("click", function () {
            subtract_quantity(minus_btn, matching_quantity_value_text, matching_quantity_value, matching_price);
        });
    });

    if(document.getElementById('card').checked) {
        document.getElementById('card_info_container').classList.remove('hidden');
    }
    else{
        document.getElementById('card_info_container').classList.add('hide');
    }

</script>

<?php
    include_once __DIR__ . '/../../_components/footer.php';
?>