<?php
    if (!isset($menuItems)) {
        echo '$toppings variable is not defined. Please check the code.';
    }

    $site_url = site_url();
?>

<div class="toppings_container">
    <h4 class="toppings_container_title">Make it even better:</h4>
    <div class="toppings_images">
    <?php
        $query = "SELECT * FROM menu WHERE category = 'toppings'";
        $result = mysqli_query($db_connection, $query);
        while ($topping = mysqli_fetch_assoc($result)){
            $price = '$' . number_format($topping['price']/100, 2);
            $image_path = $site_url.$topping['image_path'];
            $name = $topping['name'];
            $name = strtolower($name);
            $name = str_replace(" ", "_", $name);
            $topping_class = "js-" . $name . "-btn";
            $topping_img_class = "js-" . $name . "-btn-img";
            echo"
                <div class='toppings_image {$topping_class}'>
                    <img class='toppings_image--img {$topping_img_class}' src='{$image_path}' alt='{$topping['name']}'/>
                    <p class='toppings_title'>{$topping['name']}</p>
            ";
            if ($topping['price']>0){
                echo"
                    <p class='toppings_price'>(+$price)</p>
                ";
            }
            echo"
                </div>
            ";
        }
    ?>
    </div>
</div>