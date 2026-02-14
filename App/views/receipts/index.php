<section class="card">
    <div class="card-header">
        <h2>Receipts</h2>
        <a class="btn-link" href="<?= htmlspecialchars($baseUrl) ?>/receipts/create">Create Receipt</a>
    </div>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="alert alert-success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Receipt #</th>
            <th>Date</th>
            <th>Items</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($receipts)): ?>
            <tr>
                <td colspan="6">No receipts found.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($receipts as $receipt): ?>
                <tr>
                    <td><?= (int)$receipt['id'] ?></td>
                    <td><?= htmlspecialchars($receipt['receipt_number']) ?></td>
                    <td><?= htmlspecialchars($receipt['receipt_date']) ?></td>
                    <td><?= (int)$receipt['item_count'] ?></td>
                    <td>$<?= number_format((float)$receipt['total_amount'], 2) ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($baseUrl) ?>/receipts/show?id=<?= (int)$receipt['id'] ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</section>

