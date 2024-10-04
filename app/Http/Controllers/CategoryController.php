<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function sortCategories($categories) {
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


    public function store(Request $request) {
        Log::info('Category store method called');
        $request->validate([
            'category-name' => 'required|string|max:255',
            'category-image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('category-image')) {
            $image = $request->file('category-image');
            $uniqueId = uniqid();
            $imageName = $uniqueId . '-' . $image->getClientOriginalName(); 
            $image->move(public_path('uploads/categories'), $imageName);
            Category::create([
                'name' => $request->input('category-name'),
                'cover_image' => 'uploads/categories/' . $imageName,
            ]);
        };

        return redirect()->back()->with('success', 'Category added successfully!');
    }


    public function destroy($id) {
        $category = Category::findOrFail($id);

        $imagePath = public_path($category->cover_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }


    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
    $category = Category::findOrFail($id);
    $request->validate([
        'category-name' => 'required|string|max:255',
        'category-image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $category->name = $request->input('category-name');

    if ($request->hasFile('category-image')) {
        $oldImagePath = public_path($category->cover_image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $image = $request->file('category-image');
        $uniqueId = uniqid();
        $imageName = $uniqueId . '-' . $image->getClientOriginalName(); 
        $image->move(public_path('uploads/categories'), $imageName);
        $category->cover_image = 'uploads/categories/' . $imageName;
    }
    $category->save();

    return redirect()->route('admin.index')->with('success', 'Category updated successfully!');
}

}
