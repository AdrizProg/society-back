#!/bin/bash

    echo "Empieza el deploy"

    cd /var/www/html/society-back

    git pull origin master

    composer install

    npm i

    php artisan optimize:clear

    sudo service php8.3-fm-reload

    npm run build

    echo "Deploy terminado"
