<?php

use App\Admin\Controllers\CatalogController;
use App\Admin\Controllers\CoreConfigController;
use App\Admin\Controllers\PostCommentController;
use App\Admin\Controllers\PostController;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('cafe/posts', PostController::class);
    $router->resource('cafe/catalogs', CatalogController::class);
    $router->resource('cafe/core-configs', CoreConfigController::class);
    $router->resource('cafe/post-comments', PostCommentController::class);

});
