<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function sortCategories($categories)
    {
        $shortCategories = [];
        $longCategories = [];

        foreach ($categories as $category) {
            $imageInfo = getimagesize($category['cover_image']);
            if ($imageInfo && isset($imageInfo[0], $imageInfo[1])) {
                if ($imageInfo[0] > $imageInfo[1]) {
                    $shortCategories[] = $category;
                } else {

                    $longCategories[] = $category;
                }

            }
        }

        $sortedCategories = [];
        $remaining = null;

        $longerArray = count($shortCategories) >= count($longCategories) ? $shortCategories : $longCategories;
        $shorterArray = count($shortCategories) <= count($longCategories) ? $shortCategories : $longCategories;

        $difference = abs(count($longerArray) - count($shorterArray));

        for ($i = 0; $i < count($shorterArray); $i++) {
            $sortedCategories[] = $longerArray[$i];
            $sortedCategories[] = $shorterArray[$i];
        }

        if ($difference > 0) {
            $remaining = array_slice($longerArray, count($shorterArray));

        }

        return [$sortedCategories, $remaining];
    }

}
