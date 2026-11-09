<?php
require_once 'database.php';

// Read all products
function get_products() {
    $conn = get_connection();
    $sql = 'SELECT product_id, product_name, product_description, product_cost
            FROM products ORDER BY product_id';
    $result = $conn->query($sql);
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $products;
}

// Read one product by id (returns null if not found)
function get_product($id) {
    $conn = get_connection();
    $stmt = $conn->prepare(
        'SELECT product_id, product_name, product_description, product_cost
         FROM products WHERE product_id = ?'
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $product;
}