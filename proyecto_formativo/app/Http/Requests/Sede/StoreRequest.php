<?php

namespace App\Http\Requests\Sede;

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
            'nombre_sede' => 'required|string',
            'fk_id_centro' => 'required|exists:centros,id_centro',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_sede.required' => 'El nombre de la sede es obligatorio.',
            'fk_id_centro.required' => 'El centro es obligatorio.',
            'fk_id_centro.exists' => 'El centro seleccionado no existe.',
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
