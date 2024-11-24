<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');  

Route::post('/', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::post('posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
