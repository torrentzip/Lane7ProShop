<?php
require_once 'includes/product_functions.php';
require_once 'includes/cart_functions.php';

start_cart();                 // must run before any HTML output
$products = get_products();

include 'includes/header.php';
?>

<h2>Product Catalog</h2>
<p><a href="cart.php">View Cart</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Cost</th>
        <th>In Cart</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= $p['product_id'] ?></td>
        <td><?= htmlspecialchars($p['product_name']) ?></td>
        <td><?= htmlspecialchars($p['product_description']) ?></td>
        <td>$<?= number_format($p['product_cost'], 2) ?></td>
        <td><?= get_quantity($p['product_id']) ?></td>
        <td>
            <form method="post" action="cart_action.php">
                <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
                <button type="submit" name="action" value="add">Add to Cart</button>
                <button type="submit" name="action" value="decrease">-</button>
                <button type="submit" name="action" value="increase">+</button>
                <button type="submit" name="action" value="remove">Remove</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'includes/footer.php'; ?>