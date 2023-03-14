<?php
include_once __DIR__ . '/../../app.php';

// get menu data from database
$query = "SELECT * FROM menu WHERE id ={sanitize_value($_GET['id'])}";
$result = mysqli_query($db_connection, $query);
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
            <a href='{$site_url}/final/order/index.php'>
                <img src='<{$site_url}/../../_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>{$menuItem['name']}</h1>
        </div>
        
        <div class="order_footer">
            <h1 class='order_price'>{$menuItem['name']}</h1>
            <button class='button add_cart_button'>Add to Cart</buttom>
        </div>
    ";
?>

<?php
include_once __DIR__ . '/../../_components/footer.php';
?>