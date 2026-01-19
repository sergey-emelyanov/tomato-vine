<?php

use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('posts', [PostController::class, 'index']);

require __DIR__.'/auth.php';
