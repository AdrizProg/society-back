#!/bin/bash

    echo "Empieza el deploy"

    cd /var/www/html/society-back

    git pull origin master

    php artisan route:clear

    npm run build

    echo "Deploy terminado"