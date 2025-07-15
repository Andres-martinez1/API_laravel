<?php

namespace App\Http\Requests\Municipio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_municipio' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_municipio.required' => 'El nombre del municipio es obligatorio.',
            'nombre_municipio.string' => 'El nombre debe ser un texto.',
            'nombre_municipio.max' => 'El nombre no debe superar los 255 caracteres.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => 'Error de validación',
            'detalles' => $validator->errors(),
        ], 422));
    }
}
