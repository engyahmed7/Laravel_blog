<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}',[PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->where('id', '[0-9]+');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->where('id', '[0-9]+');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->where('id', '[0-9]+');
Route::get('/posts/trash' , [PostController::class, 'getTrashed'])->name('posts.trash')->where('id', '[0-9]+');

Route::fallback(fn()=>'Route not found.');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
