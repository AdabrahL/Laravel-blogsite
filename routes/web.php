<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminBlogController;

// ✅ Public blog routes
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// ✅ Authentication routes (login, register, logout)
Auth::routes();

// ✅ Admin routes (protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminBlogController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.create');
    Route::post('/', [AdminBlogController::class, 'store'])->name('admin.store');

    Route::get('/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin.edit');
    Route::put('/{blog}', [AdminBlogController::class, 'update'])->name('admin.update');

    Route::delete('/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.destroy');
});
