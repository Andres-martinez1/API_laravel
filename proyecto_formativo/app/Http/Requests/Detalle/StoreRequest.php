<?php

namespace App\Http\Requests\Detalle;

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
            'movimiento' => 'required|string',
            'fk_id_elemento' => 'required|exists:elementos,id_elemento',
            'asignado' => 'required|string',
            'estado' => 'required|string',
            'retorno' => 'required|date',
            'fecha' => 'required|date',
            'fk_id_ficha' => 'required|exists:ficha,id_ficha',
            'id_solicitud' => 'required|exists:solicitudes,id_solicitud',
        ];
    }

    public function messages(): array
    {
        return [
            'movimiento.required' => 'El campo movimiento es obligatorio.',
            'fk_id_elemento.exists' => 'El elemento seleccionado no existe.',
            'fk_id_ficha.exists' => 'La ficha seleccionada no existe.',
            'id_solicitud.exists' => 'La solicitud seleccionada no existe.',
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
