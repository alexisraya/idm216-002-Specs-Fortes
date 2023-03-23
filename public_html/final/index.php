<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Home';
include_once __DIR__ . '/../_components/header.php';
?>

<div class="home_header">
    <img class="burger_background" src="<?php echo site_url(); ?>/_dist/images/final/fortes_logo_large.png" alt="Burger Background">
    <a href="<?php echo site_url(); ?>/final/order/index.php?>" class="button start_order_button">START ORDER</a>
</div>
<div class="burger_of_the_month">
    <h2 class="burger_of_the_month_title">BURGER OF THE MONTH</h2>
    <div class="burger_of_the_month_content">
        <picture>
            <source media="(max-width: 800px)" srcset="<?php echo site_url(); ?>/_dist/images/final/burger_of_the_month.png">
            <source media="(min-width: 801px)" srcset="<?php echo site_url(); ?>/_dist/images/menu_page/royal-burger.png">
            <img class="burger_of_the_month--img" src="<?php echo site_url(); ?>/_dist/images/menu_page/royal-burger.png" alt="Burger of the Month">
        </picture>
        <div class="burger_of_the_month_text">
            <h3 class="burger_of_the_month_name">The <br> Forte <br> Burger</h3>
            <p class="burger_of_the_month_description">With grilled onions, lettuce, pickles, and double patties, this is a SPECIAL ORDER just for you!</p>
            <a href="<?php echo site_url(); ?>/final/order/index.php?>" class="button order_now_button">ORDER NOW</a>
        </div>
    </div>
</div>
<div class="what_we_do">
    <h2 class="what_we_do_title">What We Do</h2>
    <h3 class="what_we_do_subtitle">Fresh<br>Burgers.</h3>
    <p class="what_we_do_description">Plain and simple, fast and fresh. Forte’s Fresh Burgers brings the freshest tasting beef burgers to communities and campuses all across the nation.</p>
    <p class="hours">Open Monday-Friday: 11AM - 5PM</p>
    <!-- <a href="#" class="button locations_button">OUR LOCATIONS</a> -->
</div>

<?php
include_once __DIR__ . '/../_components/footer.php';
?>