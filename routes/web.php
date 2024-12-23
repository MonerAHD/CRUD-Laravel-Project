<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;







Route::middleware('guest')->group(function(){

    Route::get('/', [AuthController::class, 'loginForm'])->name('login');

    Route::post('/', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    
    Route::resource('posts', PostController::class);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


// Route::get('/', [PostController::class, 'index'])->name('posts.index');  

// Route::post('/', [PostController::class, 'store'])->name('posts.store');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::post('posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
