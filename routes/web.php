<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AdminController; // Don't forget to import AdminController if you have it
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [RouteController::class, 'index']);
Route::get('/Rólam', [RouteController::class, 'about']);
Route::get('/Vásárlás_menete', [RouteController::class, 'how_to_buy']);
Route::get('/Kapcsolat', [RouteController::class, 'contact']);
Route::get('/Kategória-{category}', [RouteController::class, 'category']);
Route::get('/Termék-{product}', [RouteController::class, 'product']);
Route::get('/Rendelés', [RouteController::class, 'order']);

// Login routes
Route::get('/login', [RouteController::class, 'login']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Admin routes - protected by middleware
Route::middleware([CheckAdmin::class, 'auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); // Admin dashboard

    // Route for category store (move to CategoryController)
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
});

