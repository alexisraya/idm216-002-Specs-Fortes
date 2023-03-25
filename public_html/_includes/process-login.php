<?php
include __DIR__ . '/../app.php';

$site_url = site_url();

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$username = sanitize_value($_POST['username']);
$password = sanitize_value($_POST['password']);
$newUser = get_user_by_username_and_password($username, $password);


// Check there are no errors with our SQL statement

if ($newUser) {
    //update current user order, replace id with newuser id 
    $query = "UPDATE orders SET user_id = {$newUser['id']} WHERE id = {$userOrder['id']}";
    $result = mysqli_query($db_connection, $query);
    delete_user_by_id($user['id']);
    $_SESSION['user'] = [
        'id' => $newUser['id'],
    ];
    
    redirect_to('/final/cart/index.php');
} else {
    $error_message = 'Username or Password is Incorrect ' . mysqli_error($db_connection);
    redirect_to('/login/index.php?error=' . $error_message);
}