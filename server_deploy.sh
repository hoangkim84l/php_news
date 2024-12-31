#!/bin/sh

echo "Deploying application ..."

(php artisan down --message 'Trang web đang được cập nhật phiên bản mới chờ tý!')

    # Update codebase
    git fetch origin deploy
    git reset --hard origin/deplop

    # Install dependencies
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Migrate new database
    php artisan migrate --force

    # Note: If you're using queue workers, this is the place to restart them.
    # ...

    # Clean cache
    php artisan optimize

    # Reload PHP to update opcache
    echo "" | sudo -S service php8.2-fpm reload

# Exit maintenance mode
php artisan up

echo "Application deployed!"