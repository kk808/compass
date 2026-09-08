<?= $this->setVar('title', 'Compass Tasks API')->extend('layouts/main') ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5.25.3/swagger-ui.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div id="swagger-ui"></div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="https://unpkg.com/swagger-ui-dist@5.25.3/swagger-ui-bundle.js"></script>
    <script>
        // Resolve against this page so requests use the same host and port.
        const specUrl = new URL(window.location.href);
        specUrl.pathname = specUrl.pathname.replace(/\/docs\/?$/, '/openapi.json');
        specUrl.search = '';
        specUrl.hash = '';
        SwaggerUIBundle({
            url: specUrl.href,
            dom_id: '#swagger-ui',
            deepLinking: true,
            validatorUrl: null,
            presets: [SwaggerUIBundle.presets.apis]
        });
    </script>
<?= $this->endSection() ?>
