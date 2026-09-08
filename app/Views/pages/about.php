<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- about page -->
<h1><?= esc($title ?? '') ?></h1>
<p><?= esc($description ?? '') ?></p>
<?= $this->endSection() ?>
