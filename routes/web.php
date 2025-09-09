<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'posts', 'as'=>'posts.'], function(){
    Route::get('/index/', [PostController::class, 'index']);
    Route::get('/store/', [PostController::class, 'store']);
    Route::get('/update/{post}', [PostController::class, 'update']);
    Route::get('/delete/{post}', [PostController::class, 'destroy']);
    Route::get('/{post}/', [PostController::class, 'show']);
});
