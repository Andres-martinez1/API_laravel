<?php

namespace App\Http\Requests\EntregaMaterial;

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
            'id_solicitud' => 'sometimes|required|exists:solicitudes,id_solicitud',
            'id_usuario_responsable' => 'sometimes|required|exists:usuarios,id_usuario',
            'fecha_entrega' => 'sometimes|required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'id_solicitud.exists' => 'La solicitud proporcionada no es válida.',
            'id_usuario_responsable.exists' => 'El usuario responsable no existe.',
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
