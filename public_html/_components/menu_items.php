<?php
    if (!isset($menuItems)) {
        echo '$menuItems variable is not defined. Please check the code.';
    }

    $site_url = site_url();
?>

<div class='menu_category'>
    <h2 class='category_title'>SPECIALS</h2>
    <div class='menu_category--items'>
    <?php
        $query = "SELECT * FROM menu WHERE category = 'specials'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
                $price = '$' . number_format($menuItem['price']/100, 2);
                $image_path = $site_url.$menuItem['image_path'];
            echo "
                <a class='menu_item_link' href='{$site_url}/final/order/customize.php?id={$menuItem['id']}'>
                    <div class='menu_item_container'>
                        <div class='menu_item_image'>
                        <img class='menu_item_image--img' src={$image_path} alt={$menuItem['name']}>
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
</div>

<div class='menu_category'>
    <h2 class='category_title'>BURGERS</h2>
    <div class='menu_category--items'>
    <?php
        $query = "SELECT * FROM menu WHERE category = 'burgers'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)){
            $price = '$' . number_format($menuItem['price']/100, 2);
            $image_path = $site_url.$menuItem['image_path'];
            echo "
                <a class='menu_item_link' href='{$site_url}/final/order/customize.php?id={$menuItem['id']}'>
                <div class='menu_item_container'>
                    <div class='menu_item_image'>
                    <img class='menu_item_image--img' src={$image_path} alt={$menuItem['name']}>
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
</div>

<div class='menu_category'>
    <h2 class='category_title'>SIDES</h2>
    <div class='menu_category--items'>
    <!-- TODO: FORM FOR SIDES -->
    <?php
        $query = "SELECT * FROM menu WHERE category = 'sides'";
        $result = mysqli_query($db_connection, $query);
        while ($menuItem = mysqli_fetch_assoc($result)) {
            $price = '$' . number_format($menuItem['price']/100, 2);
            $image_path = $site_url.$menuItem['image_path'];
            echo "
            <form class='sides_form_{$menuItem['name']}' action='{$site_url}/_includes/add_order.php' method='POST'>
				<input type='hidden' name='item_name' value='{$menuItem['name']}'>
                <input type='hidden' name='item_price' value='{$price}'>
                <input type='hidden' name='order_id' value='{$userOrder['id']}'>
                <input type='hidden' name='menu_item_id' value='{$menuItem['id']}'>
                <button class='sides_button' type='submit'>
                    <div class='menu_item_container sides_item_container'>
                        <div class='menuItem_image'>
                        <img class='menu_item_image--img' src={$image_path} alt={$menuItem['name']}'>
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
                </button>
            </form>
            ";
        }
    ?>
    </div>
</div>