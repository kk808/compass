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

