<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Team';
include_once __DIR__ . '/../_components/header.php';
?>

<div class="login_container">
    <h1 class="login__title">Sign Up</h1>
    <h2 class="login_subtitle">Already have an account? <a class="signup_link" href="index.php">Sign In Here -></a></h2>

    <form action="<?php echo site_url() . '/_includes/process-create-users.php' ?>" class="login_form">
        <div class="name">
            <h3><label class="login_label" for="name">Name:</label></h3>
            <input class ="login_input" type="text" id="name" name="name">
        </div>

        <div class="username">
            <h3><label class="login_label" for="userName">Create Username:</label></h3>
            <input class ="login_input" type="text" id="username" name="username">
        </div>
            
        <div class="password">
            <h3><label class="login_label" for="password">Create Password:</label></h3>
            <input class ="login_input" type="password" id="password" name="password">
        </div>

        <div class="email">
            <h3><label class="login_label" for="email">Email (Optional):</label></h3>
            <input class ="login_input" type="text" id="email" name="email">
        </div>

        <div class="phone_number">
            <h3><label class="login_label" for="phone_number">Phone Number (Optional):</label></h3>
            <input class ="login_input" type="text" id="phone_number" name="phone_number">
        </div>

        <div class="login_button">
            <input class="login_submit" type="submit" value="Sign Up">
        </div>
    </form>
</div>


<?php
include_once __DIR__ . '/../_components/footer.php';
?>