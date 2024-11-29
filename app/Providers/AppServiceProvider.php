<?php

namespace App\Providers;

use App\Models\Catalog;
use App\Models\Post;
use App\Observers\CatalogObserver;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Catalog::observe(CatalogObserver::class);
    }
}
