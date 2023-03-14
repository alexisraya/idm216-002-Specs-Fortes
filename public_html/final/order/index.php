<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Order';
include_once __DIR__ . '/../../_components/header.php';
$menuItems = get_menu();
?>

<div class="menu_header">
    <h1 class="menu_title">MENU</h1>
</div>
<div class="menu_container">
    <?php
    include __DIR__ . '/../../_components/menu_items.php';
    ?>
</div>


<?php
include_once __DIR__ . '/../../_components/footer.php';
?>