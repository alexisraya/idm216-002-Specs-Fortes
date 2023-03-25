<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Log In';
include_once __DIR__ . '/../_components/header.php';
?>

<div class="login_container">
    <h1 class="login__title">Sign In</h1>
    <h2 class="login_subtitle">Don't have an account? <a class="signup_link" href="signup.php">Sign Up Here -></a></h2>

    <form action="<?php echo site_url() . '/_includes/process-login.php' ?>" class="login_form" method="post">
        <div class="username">
            <h3><label class="login_label" for="username">Username:</label></h3>
            <input class ="login_input" type="text" id="username" name="username" value="">
        </div>
            
        <div class="password">
            <h3><label class="login_label" for="password">Password:</label></h3>
            <input class ="login_input" type="text" id="password" name="password" value="">
        </div>

        <?php
            $errorMessage = isset($_GET['error']) ? $_GET['error'] : false;
            if ($errorMessage){
                echo $errorMessage;}
        ?>

        <div class="login_button">
            <input class="login_submit" type="submit" value="Sign In">
        </div>
    </form>
</div>


<?php
include_once __DIR__ . '/../_components/footer.php';
?>