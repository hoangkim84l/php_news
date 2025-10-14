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

    $router->resource('review/posts', PostController::class);
    $router->resource('review/catalogs', CatalogController::class);
    $router->resource('review/core-configs', CoreConfigController::class);
    $router->resource('review/post-comments', PostCommentController::class);

});
