<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('posts', [PostController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('profiles', [ProfileController::class, 'index']);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
