<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Material::with('provider', 'category')->get();
    }

    public function store(MaterialRequest $request): \Illuminate\Http\JsonResponse
    {
        $material = Material::create($request->validated());

        return response()->json($material, 201);
    }

    public function show($id)
    {
        return Material::findOrFail($id);
    }

    public function update(MaterialRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $material = Material::findOrFail($id);

        $material->update($request->validated());

        return response()->json($material, 200);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $material = Material::findOrFail($id);

        $material->delete();

        return response()->json(['message' => 'Deleted'], 204);
    }

    public function getByCategory($id)
    {
        return Material::where('category_id', $id)->get();
    }

    public function getByProvider($id)
    {
        return Material::where('provider_id', $id)->get();
    }
}
