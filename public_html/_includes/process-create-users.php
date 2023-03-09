<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$name = sanitize_value($_POST['name']);
$username = sanitize_value($_POST['username']);
$email = sanitize_value($_POST['email']);
$phone_number = sanitize_value($_POST['phone_number']);
$password = sanitize_value($_POST['password']);


$result = add_user($name, $username, $email, $phone_number, $password);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/login/index.php');
} else {
    $error_message = 'Sorry there was an error creating the user ' . mysqli_error($db_connection);
    redirect_to('/admin/users?error=' . $error_message); //change later
}