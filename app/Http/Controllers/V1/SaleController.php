<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Sale::all();
    }

    public function store(SaleRequest $request): \Illuminate\Http\JsonResponse
    {
        $sale = Sale::create($request->validated());

        $sale->products()->sync($request->only('quantity', 'total_products'));

        return response()->json($sale, 201);
    }

    public function show($id)
    {
        return Sale::findOrFail($id);
    }

    public function update(SaleRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $sale = Sale::findOrFail($id);
        $sale->update($request->validated());

        return response()->json($sale, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Sale::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted',
        ], 200);
    }

    public function getByDate(Request $request): \Illuminate\Http\JsonResponse
    {
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        $sales = Sale::whereBetween('created_at', [$startDate, $endDate])->get();

        return response()->json($sales, 200);
    }

    public function getByUser($user_id): \Illuminate\Http\JsonResponse
    {
        $sales = Sale::where('user_id', $user_id)->get();

        return response()->json($sales, 200);
    }

    public function getByCustomer($customer_id): \Illuminate\Http\JsonResponse
    {
        $sales = Sale::where('customer_id', $customer_id)->get();

        return response()->json($sales, 200);
    }

    public function getProducts($id): \Illuminate\Http\JsonResponse
    {
        $sale = Sale::findOrFail($id);
        $products = $sale->products;

        return response()->json($products, 200);
    }
}
