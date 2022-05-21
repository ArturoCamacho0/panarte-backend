<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Provider::all();
    }

    public function store(ProviderRequest $request): \Illuminate\Http\JsonResponse
    {
        $provider = Provider::create($request->validated());

        return response()->json($provider, 201);
    }

    public function show($id)
    {
        return Provider::findOrFail($id);
    }

    public function update(ProviderRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $provider = Provider::findOrFail($id);

        $provider->update($request->validated());

        return response()->json($provider);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $provider = Provider::findOrFail($id);

        $provider->delete();

        return response()->json(['message' => 'Deleted'], 200);
    }
}
