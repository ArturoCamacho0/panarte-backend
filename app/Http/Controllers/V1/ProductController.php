<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        // Return te products with her category
        return Product::with('category')->get();
    }

    public function store(ProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json($product, 201);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(ProductRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $product = Product::findOrFail($id);

        $product->update($request->validated());

        return response()->json($product, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Deleted'
        ], 200);
    }

    public function getProductsByCategory($category_id): \Illuminate\Http\JsonResponse
    {
        $products = Product::where('category_id', $category_id);

        return response()->json($products, 200);
    }
}
