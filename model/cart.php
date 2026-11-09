<?php
function start_cart() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
}

function get_cart() {
    start_cart();
    return $_SESSION['cart'];
}

function get_quantity($id) {
    start_cart();
    return $_SESSION['cart'][$id] ?? 0;
}

// Never allows below 0, and 0 removes the item
function set_quantity($id, $qty) {
    start_cart();
    $qty = max(0, (int)$qty);
    if ($qty === 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id] = $qty;
    }
}

function add_to_cart($id) {
    set_quantity($id, get_quantity($id) + 1);
}

function change_quantity($id, $change) {
    set_quantity($id, get_quantity($id) + $change);
}

function remove_from_cart($id) {
    set_quantity($id, 0);
}


// Empties the cart (used by Check Out)
function clear_cart() {
    start_cart();
    $_SESSION['cart'] = [];
}

// Works out the order totals from the cart items
function calculate_totals($items) {
    $subtotal = 0;
    foreach ($items as $item) {
        $subtotal += $item['total'];
    }
    $subtotal = round($subtotal, 2);
    $tax = round($subtotal * TAX_RATE, 2);
    $shipping = round($subtotal * SHIPPING_RATE, 2);  // based on pre-tax total
    $order_total = round($subtotal + $tax + $shipping, 2);

    return [
        'subtotal'    => $subtotal,
        'tax'         => $tax,
        'shipping'    => $shipping,
        'order_total' => $order_total,
    ];
}