<?php

namespace App\Http\Requests\Entrada;

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
            'cantidad_ingresada' => 'required|numeric|min:0.01',
            'proveedor' => 'required|string',
            'fecha_ingreso' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_bodega.exists' => 'La bodega seleccionada no existe.',
            'fk_id_elemento.exists' => 'El elemento seleccionado no existe.',
            'cantidad_ingresada.required' => 'La cantidad es obligatoria.',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
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
