<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
