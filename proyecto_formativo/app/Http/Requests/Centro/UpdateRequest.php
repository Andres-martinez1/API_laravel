<?php

namespace App\Http\Requests\Centro;

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
            'nombre_centro' => 'required|string|max:255',
            'fk_id_municipio' => 'nullable|exists:municipio,id_municipio',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_centro.required' => 'El nombre del centro es obligatorio.',
            'nombre_centro.string' => 'Debe ingresar texto en el nombre del centro.',
            'nombre_centro.max' => 'El nombre del centro no debe exceder los 255 caracteres.',
            'fk_id_municipio.exists' => 'El municipio seleccionado no existe.',
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
