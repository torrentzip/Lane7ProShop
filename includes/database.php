<?php
// Opens a connection to the lane7_shop database
function get_connection() {
    $conn = new mysqli('localhost', 'ecpi_user', 'Password1', 'lane7_shop');
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }
    return $conn;
}