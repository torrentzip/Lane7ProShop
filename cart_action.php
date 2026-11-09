<?php
require_once 'includes/product_functions.php';
require_once 'includes/cart_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $action = $_POST['action'] ?? '';

    // Only act on real products
    if ($id && get_product($id)) {
        switch ($action) {
            case 'add':      add_to_cart($id);          break;
            case 'increase': change_quantity($id, 1);   break;
            case 'decrease': change_quantity($id, -1);  break;
            case 'remove':   remove_from_cart($id);     break;
        }
    }
}

header('Location: index.php');
exit;