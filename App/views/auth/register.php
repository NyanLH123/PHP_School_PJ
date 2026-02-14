<section class="card">
    <h2>Register</h2>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/register">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password (minimum 6 characters)</label>
        <input type="password" id="password" name="password" minlength="6" required>

        <button type="submit">Create Account</button>
    </form>

    <p>Already have an account? <a href="<?= htmlspecialchars($baseUrl) ?>/login">Login</a></p>
</section>

