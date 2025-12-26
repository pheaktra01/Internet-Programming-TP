<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // --- Get /api/products
    public function getProducts()
    {
        $products = Product::with('category')->get(); // Eager load category
        return response()->json($products);
    }

    // --- Post /api/products
    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'pricing' => $request->pricing,
            'description' => $request->description,
            'images' => $request->images,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    // --- Get /api/products/{productId}
    public function getProduct($productId)
    {
        $product = Product::with('category')->find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // --- Patch /api/products/{productId}
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'pricing' => 'sometimes|required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        $product->update($request->only(['name', 'category_id', 'pricing', 'description', 'images']));

        // Explicit JSON response
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }

    // --- Delete /api/products/{productId}
    public function deleteProduct($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
