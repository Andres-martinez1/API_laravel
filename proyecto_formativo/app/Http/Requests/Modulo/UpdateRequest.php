<?php

namespace App\Http\Requests\Modulo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_modulo' => 'sometimes|required|string|max:100|unique:modulos,nombre_modulo,' . $this->route('id'),
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_modulo.required' => 'El nombre del módulo es obligatorio.',
            'nombre_modulo.unique' => 'Este nombre de módulo ya existe.',
            'nombre_modulo.max' => 'El nombre del módulo no debe superar los 100 caracteres.',
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
