##### This Project For Collect Data

- composer install
- php artisan key:generate
- php artisan storage:link (one time run)
- php artisan serve

`https://resources.blogblog.com/img/blank.gif` empty image

---

Dùng package này để tạo trang admin: `composer require encore/laravel-admin --with-all-dependencies`

One time import
`php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"`
`php artisan admin:install`

admin/admin

1. `php artisan admin:controller App\\Models\\Story` <<< Sử dụng lệnh sau để tạo Controller cho App\Story
2. Trong app/Admin/routes.php `$router->resource('demo/stories', StoryController::class);` <<< Sử dụng lệnh này để thêm routes
3. Truy cập `{{url}}/admin/auth/menu` để cấu hình menu

---

Run the command `php artisan db:seed --class=InitDataSeeder` to init data

---

Run the command `php artisan make:command GenerateSitemap` to generate sitemap

---

No. No run ```composer update``` only run ```compose install ...``` because many package hardcode (wait for new version)

-- Github action auto deploy
```
FTP:
account: githubdeploy
pass: 3gs@
hostname: trangdo.one
```
