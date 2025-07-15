<?php

namespace App\Http\Requests\Elemento;

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
            'nombre_elemento' => 'sometimes|required|string',
            'stock' => 'sometimes|required|numeric|min:0',
            'clasificacion' => 'sometimes|required|string',
            'ficha_tecnica' => 'sometimes|required|string',
            'uso' => 'sometimes|required|string',
            'estado' => 'sometimes|required|string',
            'serial' => 'sometimes|required|string',
            'fk_id_bodega' => 'nullable|exists:bodegas,id_bodega',
            'tipo' => 'nullable|string',
            'fecha_salida' => 'nullable|date',
            'fecha_ingreso' => 'nullable|date',
            'fecha_caducidad' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'stock.numeric' => 'El stock debe ser un número.',
            'fk_id_bodega.exists' => 'La bodega seleccionada no existe.',
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
