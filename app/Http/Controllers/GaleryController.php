<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleryController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'galleries.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('uploads/gallery'), $imageName);
                Gallery::create([
                    'path' => 'uploads/gallery/' . $imageName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Kép(ek) sikeresen feltöltve!');
    }

    public function destroy($id) {
        $galleryImage = Gallery::findOrFail($id);

        $imagePath = public_path($galleryImage->path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $galleryImage->delete();

        return redirect()->back()->with('success', 'Kép sikeresen törölve a galériából!');
    }
}
