<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Thumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function  thumbnails() {
        return $this->hasMany(Thumbnail::class);
    }

    public function getRouteKeyName() {
        return 'name'; 
    }
}
