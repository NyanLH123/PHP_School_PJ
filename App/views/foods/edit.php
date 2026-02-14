<section class="card form-card">
    <h2>Edit Food Item</h2>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/foods/update">
        <input type="hidden" name="id" value="<?= (int)$food['id'] ?>">

        <label for="name">Food Name</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($food['name']) ?>" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" min="0.01" value="<?= htmlspecialchars((string)$food['price']) ?>" required>

        <button type="submit">Update</button>
    </form>
</section>

