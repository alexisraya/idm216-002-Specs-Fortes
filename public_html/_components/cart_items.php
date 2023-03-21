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
                        <p class='cart_item_price js-cart-item-price' id='{$cartItem['menu_item_id']}-price'>$price</p>
                    </div>
                </div>
            </div>
        </div>
        <form action='{$site_url}/_includes/delete_cart_item.php' method='POST''>
            <input name='cart' value='{$cartItem['cart_item_id']}' type='hidden'>
            <button type='submit' class='cart_item_cancel'>
                    <p class='cart_item_cancel--text'>X</p>
            </button>
        </form>
    </div>
";
}
?>
</div>