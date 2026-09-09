# Buidl Docker image and Test local
1. [519e33](https://github.com/kk808/compass/commit/519e3308b88b08a1c839a036f08d350f623045ae)
Note: Use Docker image php:8.3-apache, php:8.3-cli is for php command-line runtime
> docker compose --build -d

# Deploy to Google Cloud Run
1. Go to [Cloud Run](https://console.cloud.google.com/run/overview?project=compass-kk)
    - CICD: 
        - Create new project [Compass](https://console.cloud.google.com/welcome?project=compass-507901)
        - Connect repository > Github auth > 

    - Deploy manual with gloud CLI or vscode extension

## VS Code Cloud Code: Skaffold path error on Windows

Error when starting the Cloud Run build:

```text
'C:\Users\wilso\AppData\Local\Google\Cloud' is not recognized...
```

Cause: Cloud Code passed the Skaffold executable path to `cmd.exe` without quotes. The space in `Cloud SDK` split the path and prevented Skaffold from starting.

Fix applied in VS Code user settings (`C:\Users\<USERNAME>\AppData\Roaming\Code\User\settings.json`): change only the `skaffold` entry under `cloudcode.dependencyPaths` to the existing Windows short path without spaces:

```json
"skaffold": "C:\\Users\\wilso\\AppData\\Local\\Google\\CLOUDS~1\\GOOGLE~1\\bin\\skaffold.exe"
```

Only change skaffold. Keep gcloud (if there is) the same (with space)

# Google Cloud Run
Manually add .env to `Variables & Secrets` section.  
> Services > Containers > Variables & Secrets

Make sure key name seperate with underscore, not .
e.g. app_baseURL instead of app.baseUrl