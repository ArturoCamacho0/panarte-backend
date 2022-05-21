<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Purchase::all();
    }

    public function store(PurchaseRequest $request): \Illuminate\Http\JsonResponse
    {
        $purchase = Purchase::create($request->validated());

        return response()->json($purchase, 201);
    }

    public function show($id)
    {
        return Purchase::findOrFail($id);
    }

    public function update(PurchaseRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->update($request->validated());

        return response()->json($purchase, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->deleted();

        return response()->json(['message' => 'Deleted'], 200);
    }
}
