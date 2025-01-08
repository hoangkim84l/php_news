#!/bin/sh

echo "Deploying application ..."

(php artisan down --message 'Trang web đang được cập nhật phiên bản mới chờ tý!')

    echo "[1/4] Pull new Codebase"
    # Update codebase
    git pull origin

    echo "[2/4] Install dependencies"
    # Install dependencies
    composer install --no-interaction --prefer-dist --optimize-autoloader

    echo "[3/4] Migrate new database"
    # Migrate new database
    php artisan migrate --force

    # Note: If you're using queue workers, this is the place to restart them.
    # ...

    echo "[4/4] Clean cache"
    # Clean cache
    php artisan optimize

# Exit maintenance mode
php artisan up

echo "Application deployed!"