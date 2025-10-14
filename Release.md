**RELEASE 29-11-2024**

- Move to use Laravel.
- Create database.
- Create Model.
- Create Controller
- Create Admin page

**RELEASE 07-03-2025**

- Add [media-manager](https://github.com/laravel-admin-extensions/media-manager)

```
composer require laravel-admin-ext/media-manager:2.x -vvv
php artisan admin:import media-manager
[URL]/admin/media
```

media-manager/MediaManager.php

````
private function initStorage()
    {
        $disk = static::config('disk');

        $this->storage = Storage::disk($disk);

        // if (!$this->storage->getDriver()->getAdapter() instanceof Local) {
        //     Handler::error('Error', '[laravel-admin-ext/media-manager] only works for local storage.');
        // }
        $diskConfig = config("filesystems.disks.$disk");

        if (!isset($diskConfig['driver']) || $diskConfig['driver'] !== 'local') {
            Handler::error('Error', '[laravel-admin-ext/media-manager] only works for local storage.');
        }
    }
```
```

protected function getFullPath($path)
    {
        // $fullPath = $this->storage->getDriver()->getAdapter()->applyPathPrefix($path);
        $fullPath = $this->getRealPath($path);

        if (strstr($fullPath, '..')) {
            throw new \Exception('Incorrect path');
        }

        return $fullPath;
    }

protected function getRealPath($path)
    {
        $disk = static::config('disk');
        $diskConfig = config("filesystems.disks.$disk");

        if (!isset($diskConfig['root'])) {
            throw new \Exception("Storage disk [$disk] does not have a root path configured.");
        }

        return rtrim($diskConfig['root'], '/') . '/' . ltrim($path, '/');
    }
```
```
 public function getFilePreview($file)
    {
        $disk = static::config('disk');
        $diskConfig = config("filesystems.disks.$disk");
        switch ($this->detectFileType($file)) {
            case 'image':
                if (isset($diskConfig['url'])) {
                    $url = $this->storage->url($file);
                    $preview = "<span class=\"file-icon has-img\"><img src=\"$url\" alt=\"Attachment\"></span>";
                } else {
                    $preview = '<span class="file-icon"><i class="fa fa-file-image-o"></i></span>';
                }
                break;

            case 'pdf':
                $preview = '<span class="file-icon"><i class="fa fa-file-pdf-o"></i></span>';
                break;

            case 'zip':
                $preview = '<span class="file-icon"><i class="fa fa-file-zip-o"></i></span>';
                break;

            case 'word':
                $preview = '<span class="file-icon"><i class="fa fa-file-word-o"></i></span>';
                break;

            case 'ppt':
                $preview = '<span class="file-icon"><i class="fa fa-file-powerpoint-o"></i></span>';
                break;

            case 'xls':
                $preview = '<span class="file-icon"><i class="fa fa-file-excel-o"></i></span>';
                break;

            case 'txt':
                $preview = '<span class="file-icon"><i class="fa fa-file-text-o"></i></span>';
                break;

            case 'code':
                $preview = '<span class="file-icon"><i class="fa fa-code"></i></span>';
                break;

            default:
                $preview = '<span class="file-icon"><i class="fa fa-file"></i></span>';
        }

        return $preview;
    }
```

**RELEASE 30-05-2025**
- Create Github action check PHPStan and PHPcs when push to develop (ci-developer)
- Update Github action use Rsync sync source to service via SSH (mainhost)
- Update config on server_deploy.sh
- Update canonical rel
- Update post link on thread detail


**RELEASE 14-10-2025**
```
Install package
npm install
npm install --save-dev vite laravel-vite-plugin
npm install react react-dom react-router-dom
npm install --save-dev @vitejs/plugin-react


Create folder 
mkdir -p resources/js/{components,pages,layouts,router,utils}
touch resources/js/app.jsx
touch resources/views/app.blade.php

Install tailwin css
npm install react-router-dom
npm install -D tailwindcss postcss autoprefixer
npm install -D @tailwindcss/cli
npx tailwindcss init -p
```