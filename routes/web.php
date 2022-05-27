<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;


Auth::routes();

Route::get('/', [ArticleController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us'
    ]);
});

Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/categories', function () {
    return view('categories', [
        'title'         => 'Semua Artikel',
        'categories'    => \App\Models\Category::all()
    ]);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'admins' => AdminController::class,
    'users' => UserController::class,
    'news' => NewsController::class
]);
