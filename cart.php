<?php
require_once 'includes/product_functions.php';
require_once 'includes/cart_functions.php';

start_cart();
$cart = get_cart();

include 'includes/header.php';
?>

<h2>Shopping Cart</h2>
<p><a href="index.php">Continue Shopping</a></p>

<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Cost (each)</th>
        <th>Product Total</th>
    </tr>
    <?php foreach ($cart as $id => $qty): ?>
        <?php $p = get_product($id); ?>
        <?php if (!$p) continue; ?>
        <tr>
            <td><?= $p['product_id'] ?></td>
            <td><?= htmlspecialchars($p['product_name']) ?></td>
            <td><?= $qty ?></td>
            <td>$<?= number_format($p['product_cost'], 2) ?></td>
            <td>$<?= number_format($p['product_cost'] * $qty, 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>