<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){

    Route::get('/', [AuthController::class, 'loginForm'])->name('login');

    Route::get('/register',[AuthController::class, 'registerForm'])->name('register');

    Route::post('/', [AuthController::class, 'login']);
    
    Route::post('/register', [AuthController::class, 'register']);


});


Route::middleware('auth')->group(function(){
    
    Route::resource('posts', PostController::class);

    Route::get('/comments/{postId}', [CommentController::class, 'show'])->name('posts.comments');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/Dashboard', [AdminController::class, 'index'])->name('admin.index');
    
    Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('admin.allUsers');

    Route::get('/createUser', [AdminController::class, 'create'])->name('admin.create');

    Route::post('/createUser', [AdminController::class, 'store'])->name('admin.store');

    Route::get('/showUser/{id}', [AdminController::class, 'show'])->name('admin.show');

    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    
    Route::get('/editUser/{id}', [AdminController::class, 'edit'])->name('admin.edit');

    Route::get('/editProfileUser', [UserController::class, 'edit'])->name('user.edit');

    Route::put('/editProfileUser', [UserController::class, 'update'])->name('user.update');

    Route::put('/editUser/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/editComment/{id}', [CommentController::class, 'edit'])->name('comment.edit');

    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comment.update');

    Route::delete('allUsers/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    
});



// Route::get('/', [PostController::class, 'index'])->name('posts.index');  

// Route::post('/', [PostController::class, 'store'])->name('posts.store');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::post('posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
