<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;  // Correct namespace for the BlogController
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function () {
    // List all blogs
    Route::get('blogs', [BlogController::class, 'index']);
    
    // Show a single blog
    Route::get('blogs/{blog}', [BlogController::class, 'show']);
    
    // Create a new blog
    Route::post('blogs', [BlogController::class, 'store']);
    
    // Update an existing blog
    Route::put('blogs/{blog}', [BlogController::class, 'update']);
    
    // Delete a blog
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy']);
    
    // register
    Route::post('/register', [AuthController::class, 'register']);
    // Login
    Route::post('/login', [AuthController::class, 'login']);

});
