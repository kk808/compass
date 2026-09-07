<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compass Tasks API</title>
    <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5.25.3/swagger-ui.css">
</head>
<body>
    <div id="swagger-ui"></div>
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
</body>
</html>
