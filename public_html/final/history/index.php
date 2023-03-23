<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'History';
include_once __DIR__ . '/../../_components/header.php';

$order_items = getOrderItems($user['id']);
?>

<?php
    date_default_timezone_set('America/New_York');
    $current_time = date('h:i A');
    $pick_up_time = date('h:i A', strtotime('+10 minutes'));
?>

<div class="page-title-container">
    <?php $title = 'Order History';?>
    <h1 class="text-center history_title"><?php echo $title; ?></h1>
  </div>
<div class='order_history_container'>
    <?php
        $site_url = site_url();
    while ($item = mysqli_fetch_array($order_items)) {
        if($item['items_ordered']!= null){
            $price = '$'. number_format($item['final_total'],2);
            echo " 
            <div class='order_history_item_container' >
                <h2 class='order_history_number'>
                    Order Number: {$item['id']}
                </h2>
                <p class='order_history_status'>Status: {$item['status']}</p>
                <div class='pickup_time_container'>
                    <p class='pickup_time_title'>PICKUP TIME:</p>
                    <p class='pickup_time_text'>{$pick_up_time}</p>
                </div>
                <div class='total_paid_container'>
                    <p class='total_paid_title'>TOTAL PAID:</p>
                    <p class='total_paid_text'>{$price}</p>
                </div>
            </div>
            
            ";
        }
    }
    ?>
</div>


<?php
include_once __DIR__ . '/../../_components/footer.php';
?>