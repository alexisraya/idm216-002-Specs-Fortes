<?php
include_once __DIR__ . '/../../app.php';

// get menu data from database
$id = sanitize_value($_GET['id']);
$query = "SELECT * FROM menu WHERE id='{$id}'";
$result = mysqli_query($db_connection, $query);
$menuItems = get_menu();
if ($result->num_rows > 0) {
    // Get row from results and assign to $menuItem variable;
    $menuItem = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Menu item does not exist';
}

$page_title = 'Order';
include_once __DIR__ . '/../../_components/header.php';
include_once __DIR__ . '/../../_components/order_header.php';
?>

<?php
    $site_url = site_url();
    echo"
        <div class='top_nav'>
            <a class='back_button' href='{$site_url}/final/order/index.php'>
                <img src='{$site_url}/../../_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>{$menuItem['name']}</h1>
        </div>
    ";

    include_once __DIR__ . '/../../_components/toppings.php';

    echo"
        <div class='order_item_info'>
            <img class='info-icon' src='{$site_url}/../../_dist/images/final/info-icon.png' alt='info'>
            <p class='info_text'>{$menuItem['item_description']}</p>
        </div>
    ";
    
    echo"
        <form class='customize_form' action='{$site_url}/../../_includes/add_order.php' method='POST'>
            <input type='hidden' name='item_name' value='{$menuItem['name']}'>
    ";
    include_once __DIR__ . '/../../_components/added_toppings.php';
    include_once __DIR__ . '/../../_components/temperature_modal.php';

    $price = '$' . number_format($menuItem['price']/100, 2);

    echo"
            <div class='order_footer'>
                <h1 class='order_price js-order-price'>{$price}</h1>
                <input type='hidden' name='item_price' id='order_price' value='{$price}'>
                <button class='button add_cart_button' type='submit'>ADD TO CART</button>
            </div>
        </form>
    ";
?>

<!-- <script>
    const current_price = document.querySelector(".js-order-price");

    let new_order_price = Number(current_price.innerHTML.substring(1));

    let price = <?php echo $menuItem['price']; ?>;
    price = price / 100;

    function updatePrice(){
        document.getElementById("order_price").setAttribute("value", new_order_price);
    }
</script> -->


<?php
include_once __DIR__ . '/../../_components/footer.php';
?>