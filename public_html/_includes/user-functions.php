<?php
/**
 * get all users from the database
 * @return object - mysqli_result
 */
function get_users()
{
    global $db_connection;
    $query = 'SELECT * FROM users';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

/**
 * Insert a user into the database
 * @param  string $name - name of the user
 * @param  string $username - username of the user
 * @param  string $email - email of the user
 * @param  string $phone_number - phone number of the user
 * @param  string $password - password number of the user
 * @return object - mysqli_result
 */
function add_user($name, $username, $email, $phone_number, $password)
{
    global $db_connection;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users';
    $query .= ' (name, username, password, email, phone_number)';
    $query .= " VALUES ('{$name}', '{$username}', '{$hashed_password}', '{$email}', '{$phone_number}' )";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function verify_password($password)
{
    global $db_connection;
    $query = "SELECT password FROM users WHERE id = {$_SESSION['user']['id']}";
    $result = mysqli_query($db_connection, $query);
    $password = mysqli_fetch_assoc($result);
    return password_verify($_POST['password'], $password['password']);
}

function get_user_by_email_and_password($email, $password)
{
    global $db_connection;
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db_connection, $query);

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $existing_hashed_password = $user['password'];
        $isPasswordCorrect = password_verify($password, $existing_hashed_password);
        if ($isPasswordCorrect) {
            return $user;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_user_by_username_and_password($username, $password)
{
    global $db_connection;
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db_connection, $query);

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $existing_hashed_password = $user['password'];
        $isPasswordCorrect = password_verify($password, $existing_hashed_password);
        if ($isPasswordCorrect) {
            return $user;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function getUser() {
    $user = [
        'id'=> '1'
    ];
    return $user;
}


//return order array from database. only active orders(status active)
function createNewOrderByUserId($userId){
    global $db_connection;
    $query = "INSERT INTO orders";
    $query .="(user_id, checkout_time)";
    $query .= "VALUES('{$userId}', 'ASAP')";
    $result = mysqli_query($db_connection, $query);
    if(!$result){
        //TODO create error message
    }
    return $result;
}

function getOrderByUserId($userId){
    global $db_connection;
    $query= "SELECT * FROM orders WHERE user_id = {$userId} AND status = 'active' LIMIT 1";
    $result = mysqli_query($db_connection, $query);
    if($result->num_rows === 1){
    return $result;
    } else{ 
        createNewOrderByUserId($userId);
        $query= "SELECT * FROM orders WHERE user_id = {$userId} AND status = 'active' LIMIT 1";
        $result = mysqli_query($db_connection, $query);
        return $result;
    }
}

function create_guest_user(){
    global $db_connection;
    $query = 'INSERT INTO users';
    $query .= ' (isGuest)';
    $query .= " VALUES ('1')";
    $result = mysqli_query($db_connection, $query);
    if ($result) {
        $recentId = $db_connection->insert_id;
        get_user_by_id($recentId);
        // Create a user array in the SESSION variable and assign values to it
    }
         
}

function get_user_by_id($id)
{
    global $db_connection;
    
    $query = "SELECT * FROM users WHERE id = '$id'";
    
    $result = mysqli_query($db_connection, $query);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = [
            'id' => $user['id'],
        ];
        return $user;
    }
    create_guest_user();
}

function delete_user_by_id($id)
{
    global $db_connection;
    $query = "DELETE FROM users WHERE id = {$id}";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

?>