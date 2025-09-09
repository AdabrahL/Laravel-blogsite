<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function () {

    // Public routes (open to everyone)
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Protected routes (require login + token)
    Route::middleware('auth:sanctum')->group(function () {
        // Blog routes
        Route::get('blogs', [BlogController::class, 'index']);
        Route::get('blogs/{blog}', [BlogController::class, 'show']);
        Route::post('blogs', [BlogController::class, 'store']);
        Route::put('blogs/{blog}', [BlogController::class, 'update']);
        Route::delete('blogs/{blog}', [BlogController::class, 'destroy']);

        // Logout route
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
