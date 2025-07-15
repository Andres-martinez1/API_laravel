<?php

namespace App\Http\Requests\Salida;

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
            'fk_id_bodega' => 'required|exists:bodegas,id_bodega',
            'fk_id_elemento' => 'required|exists:elementos,id_elemento',
            'cantidad_entregada' => 'required|numeric|min:0.01',
            'area_destino' => 'required|string',
            'fecha_salida' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_bodega.required' => 'La bodega es obligatoria.',
            'fk_id_bodega.exists' => 'La bodega seleccionada no existe.',
            'fk_id_elemento.required' => 'El elemento es obligatorio.',
            'fk_id_elemento.exists' => 'El elemento seleccionado no existe.',
            'cantidad_entregada.required' => 'La cantidad entregada es obligatoria.',
            'cantidad_entregada.numeric' => 'Debe ser un número válido.',
            'area_destino.required' => 'El área destino es obligatoria.',
            'fecha_salida.required' => 'La fecha de salida es obligatoria.',
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
