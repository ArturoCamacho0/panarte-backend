<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Direction::all();
    }

    public function store(DirectionRequest $request): \Illuminate\Http\JsonResponse
    {
        $direction = Direction::create($request->validated());

        return response()->json($direction, 201);
    }

    public function show($id)
    {
        return Direction::findOrFail();
    }

    public function update(DirectionRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $direction = Direction::findOrFail($id);

        $direction->update($request->validated());

        return response()->json($direction, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $direction = Direction::findOrFail($id);

        $direction->delete();

        return response()->json(['message' => 'Deleted'], 200);
    }
}
