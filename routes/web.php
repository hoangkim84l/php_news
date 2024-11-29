<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/thread.html', [PostController::class, 'index'])->name('thread');
Route::get('/thread/{thread}', [PostController::class, 'show'])->name('show-thread');
Route::get('/thread', [PostController::class, 'search'])->name('tim-thread');
Route::get('/danh-muc/{slug}', [CatalogController::class, 'show'])->name('show-danh-muc');

