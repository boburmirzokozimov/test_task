<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'storeys' => 'integer',
            'garages' => 'integer',
            'price_from' => 'integer',
            'price_to' => 'integer',
        ];
    }
}
