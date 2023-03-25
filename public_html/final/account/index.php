<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Account';
include_once __DIR__ . '/../../_components/header.php';

$site_url = site_url();

($user['isGuest']==0) ? "success": redirect_to('/login/index.php') ;

$name = $user['name'];

?>

<div class='account_nav'>
    <h1 class='top_nav_title'>YOUR ACCOUNT</h1>
</div>

<div class="account_container">
    <h1 class="account_welcome_title"> Hi <?php echo"{$name}";?>! </h1>
    <h2 class="account_welcome_subtitle"> Welcome to Forte's Burger </h2>
</div>

<?php
include_once __DIR__ . '/../../_components/footer.php';
?>