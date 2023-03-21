<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Order';
include_once __DIR__ . '/../../_components/header.php';

$page_title = 'Cart';
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
            <h1 class='top_nav_title'>Your Cart</h1>
        </div>
    
        <div class='cart_form_container'>
        ";
    include_once __DIR__ . '/../../_components/cart_items.php';
    $subtotal = (float)$total;
    $subtotal_label = '$' . number_format($subtotal, 2);
    echo"
        <div class='yellow_line'></div>
        <div class='subtotal_container'>
            <h1 class='subtotal_title'>Subtotal:</h1>
            <input type='hidden' name='subtotal' id='order_subtotal' value='{$subtotal}'>
            <h1 class='subtotal_price js-subtotal-price'>{$subtotal_label}<h1>
        </div>
    ";
    include_once __DIR__ . '/../../_components/quick_add.php';
    echo"
                <a class='button checkout_button' href='{$site_url}/final/checkout/index.php' type='submit'>CHECKOUT</a>
        </div>
    ";
?>

<script>
    const plus_btns = document.querySelectorAll(".js-cart-plus");
    const minus_btns = document.querySelectorAll(".js-cart-minus");
    const quantity_values_text = document.querySelectorAll(".js-quantity-value-text");
    const quantity_values = document.querySelectorAll(".js-quantity-value"); // actual value in input
    const prices = document.querySelectorAll(".js-cart-item-price");

    const subtotalInput = document.getElementById("order_subtotal");

    const subtotalObj = document.querySelector(".js-subtotal-price");
    let subtotal = parseFloat(subtotalObj.innerHTML.substring(1));

    function updateSubtotal(newSubtotal){
        subtotal = newSubtotal;
        subtotalObj.innerHTML = "$" + subtotal.toFixed(2);
        subtotalInput.setAttribute("value", subtotal);
    }

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

</script>

<?php
include_once __DIR__ . '/../../_components/footer.php';
?>