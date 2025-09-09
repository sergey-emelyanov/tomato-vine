<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\RepostController;

Route::group(['prefix'=>'posts', 'as'=>'posts.'], function() {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post}/', [PostController::class, 'show']);
    Route::post('/', [PostController::class, 'store']);
    Route::patch('/{post}/', [PostController::class, 'update']);
    Route::delete('/{post}/', [PostController::class, 'destroy']);
});

Route::group(['prefix'=>'categories', 'as'=>'categories.'], function(){
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category}/', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::patch('/{category}/',[CategoryController::class, 'update']);
    Route::delete('/{category}/',[CategoryController::class, 'destroy']);
});

Route::group(['prefix'=>'chats', 'as'=>'chats.'], function() {
    Route::get('/', [ChatController::class, 'index']);
    Route::get('/{chat}/', [ChatController::class, 'show']);
    Route::post('/',[ChatController::class, 'store']);
    Route::patch('/{chat}/', [ChatController::class, 'update']);
    Route::delete('/{chat}/', [ChatController::class, 'destroy']);
});

Route::group(['prefix'=>'comments', 'as'=>'comments.'], function(){
    Route::get('/', [CommentController::class, 'index']);
    Route::get('/{comment}/',[CommentController::class, 'show']);
    Route::post('/',[CommentController::class, 'store']);
    Route::patch('/{comment}/', [CommentController::class, 'update']);
    Route::delete('/{comment}/', [CommentController::class, 'destroy']);
});

Route::group(['prefix'=>'groups', 'as'=>'groups.'], function(){
    Route::get('/', [GroupController::class, 'index']);
    Route::get('/{group}/', [GroupController::class, 'show']);
    Route::post('/', [GroupController::class, 'store']);
    Route::patch('/{group}/', [GroupController::class, 'update']);
    Route::delete('/{group}/', [GroupController::class, 'destroy']);
});

Route::group(['prefix'=>'messages', 'as'=>'messages.'], function(){
    Route::get('/', [MessageController::class, 'index']);
    Route::get('/{post}/', [MessageController::class, 'show']);
    Route::post('/', [MessageController::class, 'store']);
    Route::patch('/{post}/', [MessageController::class, 'update']);
    Route::delete('/{post}/', [MessageController::class, 'destroy']);
});

Route::group(['prefix'=>'profiles', 'as'=>'profiles.'], function(){
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('/{profile}/', [ProfileController::class, 'show']);
    Route::post('/', [ProfileController::class, 'store']);
    Route::patch('/{profile}/', [ProfileController::class, 'update']);
    Route::delete('/{profile}/', [ProfileController::class, 'destroy']);
});

Route::group(['prefix'=>'reposts', 'as'=>'reposts.'], function(){
    Route::get('/', [RepostController::class, 'index']);
    Route::get('/{repost}/', [RepostController::class, 'show']);
    Route::post('/', [RepostController::class, 'store']);
    Route::patch('/{repost}/', [RepostController::class, 'update']);
    Route::delete('/{repost}/', [RepostController::class, 'destroy']);
});

