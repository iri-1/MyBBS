<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

// Route::get('/', ['App\Http\Controllers\PostController','index']);
// Route::get('/', [App\Http\Controllers\PostController::class,'index']);
Route::get('/', [PostController::class,'index']) ->name('posts.index');

// Route::get('/posts/0', [PostController::class,'index']);
// Route::get('/posts/1', [PostController::class,'index']);
// Route::get('/posts/2', [PostController::class,'index']);

// Route::get('/posts/{id}', [PostController::class,'show']) ->name('posts.show');
Route::get('/posts/{post}', [PostController::class,'show']) ->name('posts.show')
->where('post','[0-9]+');

Route::get('/posts/create', [PostController::class,'create']) ->name('posts.create');

// 追加　ADD
Route::post('/posts/store', [PostController::class,'store']) ->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class,'edit']) ->name('posts.edit')
->where('post','[0-9]+');

// Route::post('/posts/{post}/update', [PostController::class,'update']) ->name('posts.update')
// ->where('post','[0-9]+');

// データを新規に作成するときは post 形式なのですが、データの一部を更新するときは patch 形式にしてね
Route::patch('/posts/{post}/update', [PostController::class,'update']) ->name('posts.update')
->where('post','[0-9]+');

// 削除
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy']) ->name('posts.destroy')
    ->where('post', '[0-9]+');
