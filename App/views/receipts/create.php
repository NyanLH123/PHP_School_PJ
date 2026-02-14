<section class="card form-card">
    <h2>Create Receipt</h2>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/receipts/store">
        <label for="receipt_number">Receipt Number</label>
        <input type="text" id="receipt_number" name="receipt_number" required>

        <label for="receipt_date">Receipt Date</label>
        <input type="date" id="receipt_date" name="receipt_date" value="<?= htmlspecialchars($currentDate) ?>" required>

        <h3>Items</h3>
        <div id="item-rows">
            <div class="receipt-row">
                <select name="food_id[]" required>
                    <option value="">Select Food Item</option>
                    <?php foreach ($foods as $food): ?>
                        <option value="<?= (int)$food['id'] ?>">
                            <?= htmlspecialchars($food['name']) ?> ($<?= number_format((float)$food['price'], 2) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="quantity[]" min="1" value="1" required>
                <button type="button" class="btn-danger" onclick="removeRow(this)">Remove</button>
            </div>
        </div>

        <button type="button" onclick="addRow()">Add Another Item</button>
        <button type="submit">Save Receipt</button>
    </form>
</section>

<template id="receipt-row-template">
    <div class="receipt-row">
        <select name="food_id[]" required>
            <option value="">Select Food Item</option>
            <?php foreach ($foods as $food): ?>
                <option value="<?= (int)$food['id'] ?>">
                    <?= htmlspecialchars($food['name']) ?> ($<?= number_format((float)$food['price'], 2) ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="quantity[]" min="1" value="1" required>
        <button type="button" class="btn-danger" onclick="removeRow(this)">Remove</button>
    </div>
</template>

<script>
    function addRow() {
        const container = document.getElementById('item-rows');
        const template = document.getElementById('receipt-row-template');
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
    }

    function removeRow(button) {
        const container = document.getElementById('item-rows');
        if (container.children.length === 1) {
            return;
        }
        button.parentElement.remove();
    }
</script>
