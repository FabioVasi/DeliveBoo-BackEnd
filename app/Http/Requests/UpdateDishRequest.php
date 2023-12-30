<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::id();
        //return $this->post?->user_id === Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['exists:users,id'],
            'name' => ['required', 'min: 5', 'max:255'],
            'description' => ['required', 'min:10'],
            'ingredients' => ['required'],
            'price' => ['required', 'decimal:2'],
            'available' => ['required', 'boolean'],
            'img' => ['nullable', 'file', 'mimes:png,jpg,avif', 'max:20000']
        ];
    }
}
