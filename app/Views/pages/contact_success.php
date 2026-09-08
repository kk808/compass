<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div>
    <h1><?= esc($title ?? '') ?></h1>
    <p>Thank you, <?= esc($name ?? '') ?>. We have received your message and will get back to you at <?= esc($email ?? '') ?>.</p>
</div>
<?= $this->endSection() ?>
