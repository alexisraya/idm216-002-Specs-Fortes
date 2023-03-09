<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$username = sanitize_value($_POST['username']);
$password = sanitize_value($_POST['password']);
$user = get_user_by_username_and_password($username, $password);


// Check there are no errors with our SQL statement
if ($user) {
    // Create a user array in the SESSION variable and assign values to it
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
    ];
    redirect_to('/final/index.html');
} else {
    $error_message = 'User was not updated: ' . mysqli_error($db_connection);
    redirect_to('/login/index.php?error=' . $error_message);
}