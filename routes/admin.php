<?php

use App\Http\Controllers\Admin\DashBoardcontroller;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard/', [DashBoardcontroller::class, 'index'])->name('dashbord');
    Route::get('/posts/',[PostController::class, 'index'])->name('posts.index');
});
