<?php

namespace App\Http\Requests\Elemento;

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
            'nombre_elemento' => 'required|string',
            'stock' => 'required|numeric|min:0',
            'clasificacion' => 'required|string',
            'ficha_tecnica' => 'required|string',
            'uso' => 'required|string',
            'estado' => 'required|string',
            'serial' => 'required|string',
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
            'nombre_elemento.required' => 'El nombre del elemento es obligatorio.',
            'stock.required' => 'El stock es obligatorio.',
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
