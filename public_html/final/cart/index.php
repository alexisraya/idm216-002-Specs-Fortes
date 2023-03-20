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
            <a class='back_button' href='{$site_url}/final/order/index.php'>
                <img src='{$site_url}/../../_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>Your Cart</h1>
        </div>
    
        <div class='cart_form_container'>
            <form class='cart_form' action='{$site_url}/../../_includes/checkout.php' method='POST'>
        ";
    include_once __DIR__ . '/../../_components/cart_items.php';
    $subtotal = (float)$total;
    $subtotal_label = '$' . number_format($subtotal, 2);
    echo"
        <div class='yellow_line'></div>
        <div class='subtotal_container'>
            <h1 class='subtotal_title'>Subtotal:</h1>
            <h1 class='subtotal_price js-subtotal-price'>{$subtotal_label}<h1>
        </div>
        <input type='hidden' name='subtotal' id='order_subtotal' value='{$subtotal}'>
    ";
    include_once __DIR__ . '/../../_components/quick_add.php';
    echo"
                <button class='button checkout_button' type='submit'>CHECKOUT</button>
            </form>

        </div>
    ";
?>



<?php
include_once __DIR__ . '/../../_components/footer.php';
?>