#!/bin/sh

    echo "Empieza el deploy"

    cd /var/www/html/society-back

    sudo git pull

    php artisan route:clear

    npm run build

    echo "Deploy terminado"