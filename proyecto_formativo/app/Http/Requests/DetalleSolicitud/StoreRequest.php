<?php

namespace App\Http\Requests\DetalleSolicitud;

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
            'id_solicitud' => 'required|exists:solicitudes,id_solicitud',
            'id_producto' => 'required|exists:elementos,id_elemento',
            'cantidad_solicitada' => 'required|numeric|min:1',
            'observaciones' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'id_solicitud.required' => 'La solicitud es obligatoria.',
            'id_solicitud.exists' => 'La solicitud no existe.',
            'id_producto.required' => 'El producto es obligatorio.',
            'id_producto.exists' => 'El producto no existe.',
            'cantidad_solicitada.required' => 'La cantidad solicitada es obligatoria.',
            'cantidad_solicitada.numeric' => 'Debe ingresar un valor numérico.',
            'cantidad_solicitada.min' => 'Debe solicitar al menos 1 unidad.',
            'observaciones.string' => 'Las observaciones deben ser texto.',
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
