<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\RoleAccessMiddleware;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware(RoleAccessMiddleware::class . ':admin,writter')->group(function (){
    Route::get('/posts/add', [PostController::class, 'add'])->name('posts.add');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/my-posts', [PostController::class, 'myPosts'])->name('posts.my_posts');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware(RoleAccessMiddleware::class . ':admin')->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
