<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardcontroller;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdminMiddleware::class]], function(){
    Route::get('/dashboard/', [DashBoardcontroller::class, 'index'])->name('dashbord');

    //посты
    Route::group(['prefix' => 'posts'], function(){
        Route::get('/',[PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/post/create/', [PostController::class, 'create'])->name('admin.posts.create');
        Route::get('/post/{post}/',[PostController::class, 'show'])->name('admin.posts.show');
        Route::post('/post/', [PostController::class, 'store'])->name('admin.posts.store');
    });

    //категории
    Route::group(['prefix'=>'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/category/create/', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/category/{category}/', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/post/', [CategoryController::class, 'store'])->name('admin.categories.store');
    });

    //профили
    Route::group(['prefix'=>'profiles'], function(){
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profiles.index');
        Route::get('/profile/create/', [ProfileController::class, 'create'])->name('admin.profiles.create');
        Route::get('/profile/{profile}/', [ProfileController::class, 'show'])->name('admin.profiles.show');
        Route::post('/post/', [ProfileController::class, 'store'])->name('admin.profiles.store');
    });

});
