<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:1', 'max:255'],
            'last_name' => ['required','min:1', 'max:255'],
            'phone' => ['nullable', 'phone:PL'],
            'username' => ['required', 'max:255', Rule::unique('users', 'username')->ignore($this->getId())],
            'email' => ['required','email', 'max:255', Rule::unique('users', 'email')->ignore($this->getId())],
            'password' => ['nullable', 'min:8', 'max:100', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }

    private function getId():mixed
    {
        return User::where('id', $this->id)->first();
    }
}
