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