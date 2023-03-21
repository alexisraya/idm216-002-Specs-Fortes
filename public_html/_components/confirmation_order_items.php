<?php
$str = $item['items_ordered'];
if ($str != null){
    $foodName = array();
    $quantities = array();
    $prices = array();

    foreach (explode(',', $str) as $item) {
        preg_match('/(.*) \((\d+)\) - (\$\d+\.\d+)/', $item, $matches);
        $foodName[] = (string) $matches[1];
        $quantities[] = (string) $matches[2];
        $prices[] = (string) $matches[3];
    }
    
    for ($i = 0; $i < count($foodName); $i++) {
        echo"
            <div class='confirmation_item'>
                <p class='confirmation_item_name'>{$foodName[$i]}</p>
                <p class='confirmation_item_quantity'>{$quantities[$i]}</p>
                <p class='confirmation_item_price'>{$prices[$i]}</p>
            </div>
        ";
    }
}
?>