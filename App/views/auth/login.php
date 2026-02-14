<section class="card">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
        <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="alert alert-success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($baseUrl) ?>/login">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>New user? <a href="<?= htmlspecialchars($baseUrl) ?>/register">Register here</a></p>
</section>

