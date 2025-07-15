<?php

namespace App\Http\Requests\EntregaMaterial;

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
            'id_usuario_responsable' => 'required|exists:usuarios,id_usuario',
            'fecha_entrega' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'id_solicitud.required' => 'La solicitud es obligatoria.',
            'id_solicitud.exists' => 'La solicitud no existe.',
            'id_usuario_responsable.required' => 'El usuario responsable es obligatorio.',
            'id_usuario_responsable.exists' => 'El usuario responsable no existe.',
            'fecha_entrega.required' => 'La fecha de entrega es obligatoria.',
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
