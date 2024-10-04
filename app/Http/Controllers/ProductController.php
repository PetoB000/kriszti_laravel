<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function replaceLineBreaks($input) {
        $output = preg_replace('/<br\s*\/?>/i', "\n", $input);
        $output = str_replace(["\r\n", "\r", "\n"], "\n", $output);
        return $output;
    }

    public function add($categoryId) {
        $category  = Category::findOrFail($categoryId);
        return  view('product.add', compact('category'));
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $product->load('thumbnails');
        $product->description = $this->replaceLineBreaks($product->description);
        return view('product.edit', [
            'product' => $product,
            'categories' =>  $categories
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'shownImg' => 'nullable|image|mimes:jpeg,png,jpg',
            'buying_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'thumbnails.*' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $this->replaceLineBreaks($request->input('description'));
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $this->handleImageUploads($request, $product);

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Termék sikeresen hozzáadva!');
    }

    private function handleImageUploads(Request $request, Product $product) {
        if ($request->hasFile('shownImg')) {
            $shownImage = $request->file('shownImg');
            $shownImageName = time() . '-' . $shownImage->getClientOriginalName();
            $shownImage->move(public_path('uploads/products'), $shownImageName);
            $product->shownImg = 'uploads/products/' . $shownImageName;
        }
    
        if ($request->hasFile('buying_img')) {
            $buyingImage = $request->file('buying_img');
            $buyingImageName = time() . '-' . $buyingImage->getClientOriginalName();
            $buyingImage->move(public_path('uploads/products'), $buyingImageName);
            $originalImagePath = public_path('uploads/products/' . $buyingImageName);
            $processedImagePath = $this->removeBackgroundAndStore($originalImagePath);
            $product->buying_img = $processedImagePath;
        }

        $product->save();

        if ($request->hasFile('thumbnails')) {
            foreach ($request->file('thumbnails') as $thumbnail) {
                $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();
                $thumbnail->move(public_path('uploads/products/thumbnails'), $thumbnailName);
                $product->thumbnails()->create(['path' => 'uploads/products/thumbnails/' . $thumbnailName]);
            }
        }
    }
    

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|integer|exists:categories,id',
            'shownImg' => 'nullable|image|mimes:jpeg,png,jpg',
            'buying_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'thumbnails.*' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $product->name = $request->input('name');
        $product->description = $this->replaceLineBreaks($request->input('description'));
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');

        if ($request->hasFile('shownImg')) {
            $image = $request->file('shownImg');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $product->shownImg = 'uploads/products/' . $imageName;
        }

        if ($request->hasFile('buying_img')) {
            $buyingImage = $request->file('buying_img');
            $buyingImageName = time() . '-' . $buyingImage->getClientOriginalName();
            $buyingImage->move(public_path('uploads/products'), $buyingImageName);
            $originalImagePath = public_path('uploads/products/' . $buyingImageName);
            $processedImagePath = $this->removeBackgroundAndStore($originalImagePath);
            $product->buying_img = $processedImagePath;
        }

        if ($request->hasFile('thumbnails')) {
            foreach ($request->file('thumbnails') as $thumbnail) {
                $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();
                $thumbnail->move(public_path('uploads/products/thumbnails'), $thumbnailName);
                $product->thumbnails()->create(['path' => 'uploads/products/thumbnails/' . $thumbnailName]);
            }
        }

        foreach ($product->thumbnails as $thumbnail) {
            if ($request->has($thumbnail->id)) {
                if (file_exists(public_path($thumbnail->path))) {
                    unlink(public_path($thumbnail->path));
                }
                $thumbnail->delete();
            }
        }

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Termék sikeresen módosítva!');
    }

    public function removeBackgroundAndStore($imagePath) {
        $client = new Client();

        $response = $client->post('https://ai-background-remover.p.rapidapi.com/image/matte/v1', [
            'headers' => [
                'x-rapidapi-host' => 'ai-background-remover.p.rapidapi.com',
                'x-rapidapi-key' => '2adcea612dmsh7443ba77bc9faf3p102df4jsn5ce818cb9525',
            ],
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($imagePath, 'r'),
                    'filename' => basename($imagePath),
                ],
            ],
        ]);

        $processedImage = $response->getBody()->getContents();
        $fileName = uniqid() . '-processed.png';
        $processedImagePath = public_path('uploads/products/processed');
        file_put_contents($processedImagePath . '/' . $fileName, $processedImage);

        return 'uploads/products/processed/' . $fileName;
    }
    
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->load('thumbnails');

        $imagePath = public_path($product->shownImg);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $imagePath = public_path($product->buying_img);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        foreach($product->thumbnails as $thumbnail) {
            $imagePath = public_path($thumbnail->path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }


        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}