<section class="card">
    <h2>Receipt Details</h2>

    <p><strong>Receipt Number:</strong> <?= htmlspecialchars($receipt['receipt_number']) ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($receipt['receipt_date']) ?></p>

    <table>
        <thead>
        <tr>
            <th>Food Item</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Line Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($receipt['items'] as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['food_name']) ?></td>
                <td><?= (int)$item['quantity'] ?></td>
                <td>$<?= number_format((float)$item['unit_price'], 2) ?></td>
                <td>$<?= number_format((float)$item['line_total'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total Amount: $<?= number_format((float)$receipt['total_amount'], 2) ?></h3>
    <p><a href="<?= htmlspecialchars($baseUrl) ?>/receipts">Back to Receipts</a></p>
</section>

