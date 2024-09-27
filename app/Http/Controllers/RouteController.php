<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class RouteController extends Controller {

    public $categories;

    public function __construct() {
        $this->categories = Category::all()->toArray();
        
        view()->share('categories', $this->categories);
    }

    

    public function index() {
        $controller = new CategoryController();
        [$sortedCategories, $remainings] = $controller->sortCategories($this->categories);
        $galleryImages = Gallery::all()->toArray();

        return view('index', [
            'sortedCategories' => $sortedCategories,
            'remainings' => $remainings,
            'galleryImages' => $galleryImages
        ]);
    }

    public function about() {
        return view('about');
    }


    public function category() {
        return view('category');
    }


    public function contact() {
        return view('contact');
    }


    public function how_to_buy() {
        return view('how_to_buy');
    }

    
    public function product() {
        return view('product');
    }
}
