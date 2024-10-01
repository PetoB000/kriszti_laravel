<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index']);

Route::get('/Rólam', [RouteController::class, 'about']);

Route::get('/Vásárlás_menete', [RouteController::class, 'how_to_buy']);

Route::get('/Kapcsolat', [RouteController::class, 'contact']);

Route::get('/Kategória-{category}', [RouteController::class, 'category']);

Route::get('/Termék-{product}', [RouteController::class, 'product']);

Route::get('/Rendelés', [RouteController::class, 'order']);
