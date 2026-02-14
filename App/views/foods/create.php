<section class="card form-card">
    <h2>Add Food Item</h2>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/foods/store">
        <label for="name">Food Name</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" min="0.01" required>

        <button type="submit">Save</button>
    </form>
</section>

