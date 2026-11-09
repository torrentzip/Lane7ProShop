<?php
require_once BASE_PATH . 'model/product_db.php';
require_once BASE_PATH . 'model/cart.php';

start_cart();

// Cart changes arrive by POST, page views by GET
$action = $_POST['action'] ?? $_GET['action'] ?? 'catalog';

switch ($action) {
    case 'add':
    case 'increase':
    case 'decrease':
    case 'remove':
        update_cart($action);
        header('Location: index.php');
        exit;
    case 'cart':
        show_cart();
        break;
    default:
        show_catalog();
        break;
}

function update_cart($action) {
    $id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    // Only act on real products
    if (!$id || !get_product($id)) {
        return;
    }
    switch ($action) {
        case 'add':      add_to_cart($id);         break;
        case 'increase': change_quantity($id, 1);  break;
        case 'decrease': change_quantity($id, -1); break;
        case 'remove':   remove_from_cart($id);    break;
    }
}

function show_catalog() {
    $products = get_products();
    $cart = get_cart();
    include BASE_PATH . 'view/catalog.php';
}

function show_cart() {
    $items = [];
    foreach (get_cart() as $id => $qty) {
        $p = get_product($id);
        if (!$p) {
            continue;
        }
        $items[] = [
            'id'    => $p['product_id'],
            'name'  => $p['product_name'],
            'qty'   => $qty,
            'cost'  => $p['product_cost'],
            'total' => $p['product_cost'] * $qty,
        ];
    }
    include BASE_PATH . 'view/cart.php';
}