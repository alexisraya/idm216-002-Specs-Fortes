<?php

/**
 * get all recipes from the database
 * @return object - mysqli_result
 */
function get_cart()
{
    global $db_connection;
    $query = 'SELECT * FROM cart';
    $result = mysqli_query($db_connection, $query);
    return $result;
}