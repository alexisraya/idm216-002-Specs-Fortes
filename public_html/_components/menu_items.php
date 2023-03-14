<?php
    if (!isset($menuItems)) {
        echo '$menuItems variable is not defined. Please check the code.';
    }

    $site_url = site_url();
?>

<div class='menu_category'>
    <h2 class='category_title'>SPECIALS</h2>
    <?php
        $query = "SELECT * FROM menu WHERE menu_category = 'burgers'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
                $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <div class='menu_item_container'>
                    <div class='menu_item_image'>
                    <img src='http://placehold.it/83x92' alt='Menu Item Image'>
                    </div>
                    <div class='menu_item_text'>
                        <div class='menuItem_title'>
                            <h3>{$menuItem['name']}</h3>
                        </div>
                        <div class='menu_item_description'>
                            <p>{$menuItem['item_description']}</p>
                        </div>
                        <div class='menu_item_price'>
                            <p>$price</p>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>
</div>

<div class='menu_category'>
    <h2 class='category_title'>BURGERS</h2>
    <?php
        $query = "SELECT * FROM menu WHERE menu_category = 'burgers'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
            $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <div class='menu_item_container'>
                    <div class='menuItem_image'>
                    <img src='http://placehold.it/83x92' alt='Menu Item Image'>
                    </div>
                    <div class='menu_item_text'>
                        <div class='menuItem_title'>
                            <h3>{$menuItem['name']}</h3>
                        </div>
                        <div class='menu_item_description'>
                            <p>{$menuItem['item_description']}</p>
                        </div>
                        <div class='menu_item_price'>
                            <p>$price</p>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>
</div>

<div class='menu_category'>
    <h2 class='category_title'>SIDES</h2>
    <?php
        $query = "SELECT * FROM menu WHERE menu_category = 'sides'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)) {
            $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <div class='menu_item_container'>
                    <div class='menuItem_image'>
                    <img src='http://placehold.it/83x92' alt='Menu Item Image'>
                    </div>
                    <div class='menu_item_text'>
                        <div class='menuItem_title'>
                            <h3>{$menuItem['name']}</h3>
                        </div>
                        <div class='menu_item_description'>
                            <p>{$menuItem['item_description']}</p>
                        </div>
                        <div class='menu_item_price'>
                            <p>$price</p>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>
</div>