<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardcontroller;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard/', [DashBoardcontroller::class, 'index'])->name('dashbord');

    //посты
    Route::group(['prefix' => 'posts'], function(){
        Route::get('/',[PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/post/{post}/',[PostController::class, 'show'])->name('admin.posts.show');
    });

    //категории
    Route::group(['prefix'=>'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
    });

});
