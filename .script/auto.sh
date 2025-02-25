#!/bin/bash

    echo "Empieza el deploy"

    cd /var/www/html/society-back

    git pull origin master

    composer install

    php artisan optimize

    npm run build

    echo "Deploy terminado"
