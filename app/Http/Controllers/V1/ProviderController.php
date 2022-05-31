<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectionRequest;
use App\Http\Requests\ProviderRequest;
use App\Models\Direction;
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
        $provider = new Provider();
        $provider->fill($request->validated());

        $direction = Direction::create($request['direction']);
        $provider->direction_id = $direction->id;

        $provider->save();

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
