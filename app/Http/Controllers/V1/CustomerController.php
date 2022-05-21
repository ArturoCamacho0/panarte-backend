<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Customer::all();
    }

    public function store(CustomerRequest $request): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::create($request->validated());

        return response()->json($customer, 201);
    }

    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    public function update(CustomerRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->update($request->validated());

        return response()->json($customer, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json(['message' => 'Deleted'], 200);
    }

    public function getSalesByCustomer($id): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::findOrFail($id);

        $sales = $customer->sales;

        return response()->json($sales, 200);
    }
}
