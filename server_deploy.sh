#!/bin/sh

# Stop if error
set -e

echo "Deploying application ..."

echo "[1/5] Putting application into maintenance mode..."
php artisan down --message 'Trang web đang được cập nhật phiên bản mới chờ tý!' || true
# `|| true` để đảm bảo script không dừng nếu lệnh down thất bại (ví dụ: đã down rồi)

echo "[2/5] Installing Composer dependencies on server..."
# --no-interaction: Không hỏi khi chạy
# --prefer-dist: Tải về các bản phân phối đã nén (nhanh hơn)
# --optimize-autoloader: Tối ưu hóa autoloader cho production
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "[3/5] Running database migrations..."
# Migrate new database
php artisan migrate || { echo "ERROR: Database migrations failed!"; exit 1; }

# Note: If you're using queue workers, this is the place to restart them.
# ...

echo "[4/5] Clearing and caching Laravel configurations..."
# Clean cache and optimize
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo "[5/5] Checking/creating storage symlink and setting permissions..."
if [ ! -L public/storage ]; then
    echo "Creating storage symlink..."
    php artisan storage:link || { echo "ERROR: Failed to create storage symlink!"; exit 1; }
else
    echo "Storage symlink already exists."
fi

chmod -R 775 storage bootstrap/cache || { echo "ERROR: Failed to set directory permissions!"; exit 1; }

# Exit maintenance mode
echo "Bringing application up..."
php artisan up

echo "Application deployed!"