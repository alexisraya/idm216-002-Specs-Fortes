<?php
    if (!isset($menuItems)) {
        echo '$menuItems variable is not defined. Please check the code.';
    }

    $site_url = site_url();
?>

<div class='menu_category'>
    <h2 class='category_title'>SPECIALS</h2>
    <?php
        $query = "SELECT * FROM menu WHERE category = 'specials'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
                $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <a class='menu_item_link' href='{$site_url}/final/order/customize.php?id={$menuItem['id']}'>
                    <div class='menu_item_container'>
                        <div class='menu_item_image'>
                        <img class='menu_item_image--img' src={$menuItem['image_path']} alt={$menuItem['name']}>
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
                </a>
            ";
        }
    ?>
</div>

<div class='menu_category'>
    <h2 class='category_title'>BURGERS</h2>
    <?php
        $query = "SELECT * FROM menu WHERE category = 'burgers'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
            $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <a class='menu_item_link' href='{$site_url}/final/order/customize.php?id={$menuItem['id']}'>
                <div class='menu_item_container'>
                    <div class='menu_item_image'>
                    <img class='menu_item_image--img' src={$menuItem['image_path']} alt={$menuItem['name']}>
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
            </a>
        ";
        }
    ?>
</div>

<div class='menu_category'>
    <h2 class='category_title'>SIDES</h2>
    <!-- TODO: FORM FOR SIDES -->
    <?php
        $query = "SELECT * FROM menu WHERE category = 'sides'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)) {
            $price = '$' . number_format($menuItem['price']/100, 2);
            echo "
                <div class='menu_item_container'>
                    <div class='menuItem_image'>
                    <img class='menu_item_image--img' src={$menuItem['image_path']} alt={$menuItem['name']}'>
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