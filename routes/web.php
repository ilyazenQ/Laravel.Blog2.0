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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/articles', [\App\Http\Controllers\ArticleController::class,'index'])->name('article.index');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/tag/{tag}', [App\Http\Controllers\ArticleController::class, 'allByTag'])->name('article.tag');
Route::get('/articles/category/{category}', [App\Http\Controllers\ArticleController::class, 'allByCategory'])->name('article.category');

Route::get('/search', [\App\Http\Controllers\SearchController::class,'search'])->name('search');

Route::get('/login',[\App\Http\Controllers\AuthController::class,'index']);
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');



Route::group(['prefix' => 'admin',
'middleware' => 'admin'
], function () {
   Route::get('/', [\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
   Route::resource('/tag', \App\Http\Controllers\TagController::class);
   Route::resource('/category', \App\Http\Controllers\CategoryController::class);
   Route::resource('/post', \App\Http\Controllers\PostController::class);
});