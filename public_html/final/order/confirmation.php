<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Checkout';
include_once __DIR__ . '/../../_components/header.php';
include_once __DIR__ . '/../../_components/order_header.php';

$order_items = getOrderItems($user['id']);
?>

<?php
    $site_url = site_url();
    echo"
        <div class='top_nav'>
            <a class='back_button' href='{$site_url}/final/cart/index.php'>
                <img src='{$site_url}/../../_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>CONFIRMATION</h1>
        </div>

        <div class='confirmation_container'>
            <p class='confirmation_text'>Present this at the truck to pick-up your food</p>
            <h1 class='confirmation_number'>Order #{$user['id']} {$user['name']}</h1>
            <div class='confirmation_img_container'>
                <img class='confirmation_img' src='https://via.placeholder.com/151x151' alt='confirmation icon'>
                <h2 class='confirmation_img_text'>Paid</h2>
            </div>

            <div class='confirmation_location'>
                <img class='confirmation_location_icon' src='https://via.placeholder.com/37x37' alt='location icon'>
                <div class='confirmation_location_text'>
                    <p class='confirmation_location_title'>Drexel University -</p>
                    <p class='confirmation_location_address'>Market & 33rd Street</p>
                </div>
            </div>
            <div class='home_btn_container'>
                <a class='button home_btn' href='{$site_url}/final/index.php'>Back Home</a>
            </div>
    ";

    // while($order_item = mysqli_fetch_array($order_items))
    // {
    //     var_dump($order_item['user_id']);
    // }
?>

<?php
    echo"</div>";
?>

<?php
    include_once __DIR__ . '/../../_components/footer.php';
?>