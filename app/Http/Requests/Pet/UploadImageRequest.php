<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'photo' => ['required', 'image', 'max:2048']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
