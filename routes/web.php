<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RouteController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;



// Public routes
Route::get('/', [RouteController::class, 'index']);
Route::get('/Rólam', [RouteController::class, 'about']);
Route::get('/Vásárlás_menete', [RouteController::class, 'how_to_buy']);
Route::get('/Kapcsolat', [RouteController::class, 'contact']);
Route::get('/Kategória/{category}', [RouteController::class, 'category']);
Route::get('/Termék/{product}', [RouteController::class, 'product']);
Route::get('/Rendelés', [RouteController::class, 'order']);

// Login routes
Route::get('/login', [RouteController::class, 'login']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Admin routes - protected by middleware
Route::middleware([CheckAdmin::class, 'auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Category routes
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');

    // Product routes
    Route::resource('product', ProductController::class)->except(['show']);
    Route::get('product/add/{category}', [ProductController::class, 'add'])->name('product.add');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');

    // Galery routes
    Route::post('gallery/store', [GaleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GaleryController::class, 'destroy'])->name('gallery.destroy');
});

