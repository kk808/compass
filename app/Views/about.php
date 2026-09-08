<?= $this->setData(['title' => 'About', 'bodyClass' => 'about-page', 'contentClass' => 'about-content'])->extend('layouts/main') ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= esc(base_url('css/about.css'), 'attr') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Hello, world!</h1>
<?= $this->endSection() ?>
