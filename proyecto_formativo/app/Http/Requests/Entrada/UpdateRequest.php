<?php

namespace App\Http\Requests\Entrada;

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
            'fk_id_bodega' => 'sometimes|required|exists:bodegas,id_bodega',
            'fk_id_elemento' => 'sometimes|required|exists:elementos,id_elemento',
            'cantidad_ingresada' => 'sometimes|required|numeric|min:0.01',
            'proveedor' => 'sometimes|required|string',
            'fecha_ingreso' => 'sometimes|required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_bodega.exists' => 'La bodega seleccionada no existe.',
            'fk_id_elemento.exists' => 'El elemento seleccionado no existe.',
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
