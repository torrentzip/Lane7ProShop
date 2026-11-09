<?php include BASE_PATH . 'view/header.php'; ?>

<h2>Shopping Cart</h2>
<p><a href="index.php">Continue Shopping</a></p>

<?php if (empty($items)): ?>
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
    <?php foreach ($items as $item): ?>
    <tr>
        <td><?= $item['id'] ?></td>
        <td><?= htmlspecialchars($item['name']) ?></td>
        <td><?= $item['qty'] ?></td>
        <td>$<?= number_format($item['cost'], 2) ?></td>
        <td>$<?= number_format($item['total'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<?php include BASE_PATH . 'view/footer.php'; ?>