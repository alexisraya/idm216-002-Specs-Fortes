<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}
$order_id_value = sanitize_value($_POST['this_order_id']);
$total_price = sanitize_value($_POST['total_price']);
$order_name = sanitize_value($_POST['order_name']);
$pickup_time = sanitize_value($_POST['pickup_time']);

$query = "INSERT INTO users";
$query .=" (name)";
$query .= " VALUES('{$order_name}')";

$result = mysqli_query($db_connection, $query);

$query = "UPDATE orders SET status = 'completed', final_total = $total_price, order_name = '$order_name', checkout_time = '$pickup_time' WHERE id = $order_id_value";

// var_dump($query);
// die();
$result = mysqli_query($db_connection, $query);
if ($result){
    redirect_to('/../final/order/confirmation.php');   
} else{
    redirect_to('/../final/checkout/index.php');
}
    

?>
