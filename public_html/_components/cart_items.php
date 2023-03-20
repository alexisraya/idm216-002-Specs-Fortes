<?php
$site_url = site_url();
?>

<div class="cart_items_container">

<?php
$total = 0.00;
while ($cartItem = mysqli_fetch_array($cart))
{
    $total += (float)$cartItem['price'];
    $price = '$' . number_format($cartItem['price'], 2);
    echo "
    <div class='cart_item_container'>
        <div class='menu_item_container'>
            <div class='menuItem_image'>
            <img src='http://placehold.it/83x92' alt='Menu Item Image'>
            </div>
            <div class='menu_item_text'>
                <div class='menuItem_title'>
                    <h3>{$cartItem['name']}</h3>
                </div>
                <div class='menu_item_description'>
                    <p>{$cartItem['item_description']}</p>
                </div>
                <div class='cart_item_options'>
                    <div class='cart_item_quantity_container'>
                        <div class='cart_item_minus js-cart-minus' id='{$cartItem['menu_item_id']}-minus'>
                            <p class='cart_item_minus--text'>-</p>
                        </div>
                        <div class='cart_item_quantity'>
                            <p class='cart_item_quantity--text js-quantity-value-text' id='{$cartItem['menu_item_id']}-quantity-label'>{$cartItem['quantity']}</p>

                            <input type='hidden' class='js-quantity-value' id='{$cartItem['menu_item_id']}-quantity' name='quantity' value='{$cartItem['quantity']}'>
                        </div>
                        <div class='cart_item_plus js-cart-plus' id='{$cartItem['menu_item_id']}-plus'>
                            <p class='cart_item_plus--text'>+</p>
                        </div>
                    </div>
                    <div class='menu_item_price'>
                        <p class='cart_item_price'>$price</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='cart_item_cancel'>
            <p class='cart_item_cancel--text'>X</p>
        </div>
    </div>
";
}
?>
</div>

<script>
    const plus_btns = document.querySelectorAll(".js-cart-plus");
    const minus_btns = document.querySelectorAll(".js-cart-minus");
    const quantity_values_text = document.querySelectorAll(".js-quantity-value-text");
    const quantity_values = document.querySelectorAll(".js-quantity-value");

    function add_quantity(btn, quantity_value_text, quantity_value){
        let quantity_value_ammount = parseInt(quantity_value_text.innerHTML);
        quantity_value_ammount+=1;
        quantity_value.setAttribute("value", quantity_value_ammount);
        quantity_value_text.innerHTML= quantity_value_ammount.toString();
    }
    function subtract_quantity(btn, quantity_value_text, quantity_value){
        let quantity_value_ammount = parseInt(quantity_value_text.innerHTML);
        if(quantity_value_ammount>1){
            quantity_value_ammount-=1;
            quantity_value.setAttribute("value", quantity_value_ammount);
            quantity_value_text.innerHTML= quantity_value_ammount.toString();
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

        plus_btn.addEventListener("click", function () {
            add_quantity(plus_btn, matching_quantity_value_text, matching_quantity_value);
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

        minus_btn.addEventListener("click", function () {
            subtract_quantity(minus_btn, matching_quantity_value_text, matching_quantity_value);
        });
    });

</script>