<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|in:pending,paid,canceled',
            'user_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_products' => 'required|numeric',
        ];
    }
}
