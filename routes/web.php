<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['categories' => Category::all()]);
});


Route::get('/Rolam', function () {
    return view('about', ['categories' => Category::all()]);
});


Route::get('/Kapcsolat', function () {
    return view('contact', ['categories' => Category::all()]);
});


Route::get('/Vasarlas', function () {
    return view('how_to_buy', ['categories' => Category::all()]);
});


Route::get('/Kategoria', function () {
    return view('category', ['categories' => Category::all()]);
});


Route::get('/Termék', function () {
    return view('product', ['categories' => Category::all()]);
});
