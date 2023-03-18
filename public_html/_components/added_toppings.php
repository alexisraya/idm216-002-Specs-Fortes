<?php
    if (!isset($menuItems)) {
        echo '$toppings variable is not defined. Please check the code.';
    }

    $site_url = site_url();
?>

<div class="added_toppings_container">
        <?php
            $query = "SELECT * FROM menu WHERE category = 'toppings'";
            $result = mysqli_query($db_connection, $query);
            while ($topping = mysqli_fetch_assoc($result)){
                $id = "topping_" . $topping['id'];
                $name = $topping['name'];
                $name = strtolower($name);
                $name = str_replace(" ", "_", $name);
                $topping_class = "js-" . $name . "-modal";
                $minus_class =  "js-minus-" . $name;
                $minus_class_text =  $minus_class . "-text";
                $plus_class =  "js-plus-" . $name;
                $plus_class_text =  $plus_class . "-text";
                $value_class =  "js-value-" . $name;

                $image_path = $site_url.$topping['image_path'];

                echo"
                <div class='added_topping {$topping_class} hide' id='{$id}'>
                    <div class='math_btn minuss {$minus_class}'>
                        <p class='minus-text {$minus_class_text}'>-</p>
                    </div>
                    <div class='added_topping_info'>
                        <div class='added_topping_img'>
                            <img class='added_topping--img' src='{$image_path}' alt='{$topping['name']}'>
                        
                            <span class='value-label btn-text {$value_class}'>1</span>
                        </div>
                         <p class='added_topping_title'>{$topping['name']}</p>
                    </div>
                    
                    <div class='math_btn plus {$plus_class}'>
                        <p class='plus-text {$plus_class_text}'>+</p>
                    </div>
                </div>
                ";
            }
        ?>
        <!-- <div class="added_topping js-bacon">
            <div class="math_btn minus js-minus">
                <p class="minus-text js-minus-text">-</p>
            </div>

            <div class="added_topping_img">
                <img class="added_topping--img" src="<?php echo $site_url; ?>/../../_dist/images/customize_page/topping_bacon.svg" alt="bacon">
            
                <span class="value-label btn-text js-value">1</span>
            </div>

            <p class="added_topping_title">Bacon</p>
            
            <div class="math_btn plus js-plus">
                <p class="plus-text js-plus-text">+</p>
            </div>
        </div> -->
</div>