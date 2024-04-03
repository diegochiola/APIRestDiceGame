<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    //reglas de validacion
        public function rules(): array
    {
        return [
            'name' => ['required'],
            'nickname' => ['nullable'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'regex:/^[a-zA-Z0-9]+$/']
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'The name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.regex' => 'The password can only contain letters and numbers.'
    ];
}

}