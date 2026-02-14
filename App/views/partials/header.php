<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($appName ?? 'Application') ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl ?? '') ?>/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container">
        <h1><?= htmlspecialchars($appName ?? 'Application') ?></h1>
        <?php if (!empty($isAuthenticated)): ?>
            <nav>
                <a href="<?= htmlspecialchars($baseUrl ?? '') ?>/receipts">Receipts</a>
                <a href="<?= htmlspecialchars($baseUrl ?? '') ?>/receipts/create">Create Receipt</a>
                <a href="<?= htmlspecialchars($baseUrl ?? '') ?>/foods">Food Items</a>
                <form method="POST" action="<?= htmlspecialchars($baseUrl ?? '') ?>/logout" class="inline-form">
                    <button type="submit">Logout (<?= htmlspecialchars($currentUserName ?? 'User') ?>)</button>
                </form>
            </nav>
        <?php endif; ?>
    </div>
</header>
<main class="container">

