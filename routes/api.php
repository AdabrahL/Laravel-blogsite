<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;  // Correct namespace for the BlogController

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
});
