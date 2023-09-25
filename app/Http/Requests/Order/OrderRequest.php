<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pet_id' => ['required'],
            'quantity' => ['required', 'numeric']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
