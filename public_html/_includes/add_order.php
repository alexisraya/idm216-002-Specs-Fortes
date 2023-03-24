<?php
include __DIR__ . '/../app.php';
$site_url = site_url();

if (!$_POST) {
    die('Unauthorized');
}

// store $_POST data in variables
$item_name = sanitize_value($_POST['item_name']);
$item_price = sanitize_value($_POST['item_price']);
if (substr($item_price,0,1) == '$') {
    $item_price = substr($item_price,1);
}
$item_price = (float)$item_price;
$order_id = sanitize_value($_POST['order_id']);
$menu_item_id = sanitize_value($_POST['menu_item_id']);

$query = "INSERT INTO cart";
$query .=" (item_name, price, order_id, menu_item_id)";
$query .= " VALUES('{$item_name}', '{$item_price}', '{$order_id}', '{$menu_item_id}')";

$result = mysqli_query($db_connection, $query);


if ($result) {
    echo("success");
    redirect_to('/final/cart/index.php');
} 

else {
    $error_message = 'Sorry there was an error in adding this item to cart: ' . mysqli_error($db_connection);
}
?>