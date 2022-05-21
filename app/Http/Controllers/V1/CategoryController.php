<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    public function store(CategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        $category = Category::create($request->validated());

        return response()->json($category, 201);
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(CategoryRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $category = Category::FindOrFail($id);

        $category->update($request->validated());

        return response()->json($category, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(['message' => 'Deleted'], 200);
    }
}
