<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;

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

// Route::get('/', ['App\Http\Controllers\PostController', 'index']);

// ↑と全く同じ意味
// Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

// useしてからの記述
Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

// Route::get('/posts/0', [PostController::class, 'index']);
// Route::get('/posts/1', [PostController::class, 'index']);
// Route::get('/posts/2', [PostController::class, 'index']);

// ↓ idを取得して値を返す形にする事でコードを端的にできる

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');
