<?php

namespace App\Http\Requests\Rol;

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
            'nombre_rol' => 'required|string|unique:roles,nombre_rol|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_rol.required' => 'El nombre del rol es obligatorio.',
            'nombre_rol.unique'   => 'Este nombre de rol ya existe.',
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
