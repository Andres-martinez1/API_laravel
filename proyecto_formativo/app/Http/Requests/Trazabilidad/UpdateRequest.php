<?php

namespace App\Http\Requests\Trazabilidad;

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
            'fk_id_elemento' => 'sometimes|required|exists:elementos,id_elemento',
            'tipo_movimiento' => 'sometimes|required|string',
            'fecha' => 'sometimes|required|date',
            'bodega_origen' => 'nullable|exists:bodegas,id_bodega',
            'bodega_destino' => 'nullable|exists:bodegas,id_bodega',
            'estado_actual' => 'sometimes|required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_elemento.required' => 'El elemento es obligatorio.',
            'fk_id_elemento.exists' => 'El elemento no existe.',
            'tipo_movimiento.required' => 'El tipo de movimiento es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.',
            'bodega_origen.exists' => 'La bodega de origen no existe.',
            'bodega_destino.exists' => 'La bodega de destino no existe.',
            'estado_actual.required' => 'El estado actual es obligatorio.',
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
