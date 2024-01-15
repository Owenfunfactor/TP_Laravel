<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarFilterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=> ['required', 'min:5'],
            'description' => ['required', 'min:8'],
            'brand' => ['required', 'min:5'],
            'num_plaq' => ['required', 'min:5'],
            'price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean']
        ];
    }
}
