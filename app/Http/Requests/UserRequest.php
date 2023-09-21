<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['string', 'min:4', 'max:100', 'required', Rule::unique('users', 'username')->ignore($this->username)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->email)],
            'first_name' => ['required', 'min:1', 'max:255'],
            'last_name' => ['required','min:1', 'max:255'],
            'phone' => ['nullable', 'phone:PL'],
            'password' => ['min:8', 'max:100', 'required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()]
        ];
    }
}
