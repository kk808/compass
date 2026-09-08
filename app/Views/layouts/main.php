<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Compass') ?></title>
    <?= $this->renderSection('styles') ?>
    <link rel="stylesheet" href="<?= esc(base_url('css/site.css'), 'attr') ?>">
</head>
<body class="<?= esc($bodyClass ?? '', 'attr') ?>">
    <?= $this->include('partials/header') ?>
    <main class="<?= esc($contentClass ?? '', 'attr') ?>">
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
