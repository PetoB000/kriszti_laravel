<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;

class AdminController extends Controller
{
    public function index() {
        $categories  = Category::all();
        $categories->load('products');
        $galleryImages = Gallery::all();

        return view('admin', [
            'categories' =>  $categories,
            'galleryImages' => $galleryImages
        ]);
    }
}
