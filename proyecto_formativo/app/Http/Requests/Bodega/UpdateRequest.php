<?php

namespace App\Http\Requests\Bodega;

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
            'nombre_bodega' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'fk_id_sede' => 'required|exists:sedes,id_sedes',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_bodega.required' => 'El nombre de la bodega es obligatorio.',
            'nombre_bodega.string' => 'El nombre de la bodega debe ser un texto.',
            'nombre_bodega.max' => 'El nombre de la bodega no debe exceder los 255 caracteres.',

            'encargado.required' => 'El nombre del encargado es obligatorio.',
            'encargado.string' => 'El nombre del encargado debe ser un texto.',
            'encargado.max' => 'El nombre del encargado no debe exceder los 255 caracteres.',

            'fk_id_sede.required' => 'La sede es obligatoria.',
            'fk_id_sede.exists' => 'La sede seleccionada no existe en la base de datos.',
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
