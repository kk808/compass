<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- contact page -->
<h1>Contact Us</h1>
<form action="/contact/submit" method="post">
    <?= csrf_field() ?>

    <?php if (!empty($errors)): ?>
        <ul role="alert" style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= esc($name ?? '', 'attr') ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?= esc($email ?? '', 'attr') ?>" required>
    <br>
    <button type="submit">Submit</button>
</form>
<?= $this->endSection() ?>
