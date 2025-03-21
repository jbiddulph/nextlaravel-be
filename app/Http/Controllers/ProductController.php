<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $products = Product::where('user_id', $user_id)->paginate(50);

        return response()->json([
            'status' => true,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'banner_image' => ['nullable', 'url'],
        ]);

        $data["description"] = $request->description;
        $data["cost"] = $request->cost;
        
        $data['user_id'] = auth()->user()->id;
    
        Product::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'status' => true,
            'message' => 'Product details',
            'product' => $product,
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'banner_image' => ['nullable', 'url'],
        ]);

        $data["description"] = isset($request->description) ? $request->description : $product->description;
        $data["cost"] = isset($request->cost) ? $request->cost : $product->cost;

        if ($request->hasFile('banner_image')) {
            if($product->banner_image) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $data["banner_image"] = $request->file("banner_image")->store("products", "public");
        }

        $product->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
        ]);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
        ]);
    }
}
