<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index']);

Route::get('/Rolam', [RouteController::class, 'about']);

Route::get('/Vasarlas_menete', [RouteController::class, 'how_to_buy']);

Route::get('/Kapcsolat', [RouteController::class, 'contact']);

Route::get('/Kategoria', [RouteController::class, 'category']);

Route::get('/Kategoria/{id}', [RouteController::class, 'product']);
