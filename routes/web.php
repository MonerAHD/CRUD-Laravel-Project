<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');  

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/show', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::post('/', [PostController::class, 'store'])->name('posts.store');
