#!/usr/share/env bash

# Set database info
DB_NAME="mymoney"
DB_USER="root"
DB_PASS=""

# Create database
mysql -u"$DB_USER" -p"$DB_PASS" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

# Sprawdzanie, czy polecenie się powiodło
if [ $? -ne 0 ]; then
    echo "Nie udało się utworzyć bazy danych."
    exit 1
fi

# copy .env
php -r "copy('.env.example', '.env');"

composer install

php artisan migrate

php artisan db:seed

php artisan key:generate

php artisan storage:link

npm install
if [ $? -ne 0 ]; then
    echo "Nie udało się zainstalować zależności npm."
    exit 1
fi
