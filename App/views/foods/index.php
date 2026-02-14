<section class="card">
    <div class="card-header">
        <h2>Food Items</h2>
        <a class="btn-link" href="<?= htmlspecialchars($baseUrl) ?>/foods/create">Add Food Item</a>
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
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($foods)): ?>
            <tr>
                <td colspan="4">No food items found.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($foods as $food): ?>
                <tr>
                    <td><?= (int)$food['id'] ?></td>
                    <td><?= htmlspecialchars($food['name']) ?></td>
                    <td>$<?= number_format((float)$food['price'], 2) ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($baseUrl) ?>/foods/edit?id=<?= (int)$food['id'] ?>">Edit</a>
                        <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/foods/delete" class="inline-form">
                            <input type="hidden" name="id" value="<?= (int)$food['id'] ?>">
                            <button type="submit" onclick="return confirm('Delete this food item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</section>

