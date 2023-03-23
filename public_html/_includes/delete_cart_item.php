<?php
    include __DIR__ . '/../app.php';
    if (!$_POST) {
        die('Unauthorized');
    }
    $cart_item_id = sanitize_value($_POST['cart']);

    global $db_connection;
    $query = "DELETE FROM cart WHERE id = '{$cart_item_id}'";
    $result = mysqli_query($db_connection, $query);
    redirect_to('/final/cart/index.php');
    echo("success");
?>