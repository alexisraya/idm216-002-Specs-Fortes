<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Alpha';
include_once __DIR__ . '/../_components/header.php';
?>

<div class="header">
    <div class="header_images">
        <img class="logo" src="images/homescreen_logo.png" alt="burger logo">
    </div>
    <button class="start_button">Start Order</button>
</div>

<div class="burg_of_month_container">
    <h1>Burger of the Month</h1>
    <div class="burg_of_month_image">
        <img class="burg" src="../_dist/images/alpha_page/burger.png" alt="burger of the month">
        <div class="burg_of_month_text">
            <h2>The Forte Fresh Burger</h2>
            <p>With grilled onions, lettuce, pickles, and double patties, this is a SPECIAL ORDER just for you!</p>
        </div>
    </div>
</div>
<div class="about_container">
    <h1> What We Do </h1>
    <h1>Fresh. Burgers.</h1>
    <p>Plain and simple, fast and fresh. Forte’s Fresh Burgers brings the freshest tasting beef burgers to communities and campuses all across the nation.</p>
    <button class="locations_button">Locations</button>
</div>

</body>
</html>