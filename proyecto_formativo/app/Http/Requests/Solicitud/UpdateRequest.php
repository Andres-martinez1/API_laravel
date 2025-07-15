<?php

namespace App\Http\Requests\Solicitud;

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
            'id_usuario_solicitante' => 'sometimes|required|exists:usuarios,id_usuario',
            'estado_solicitud' => 'sometimes|required|string',
            'fecha_solicitud' => 'sometimes|required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'id_usuario_solicitante.required' => 'El usuario solicitante es obligatorio.',
            'id_usuario_solicitante.exists' => 'El usuario solicitante no existe.',
            'estado_solicitud.required' => 'El estado es obligatorio.',
            'fecha_solicitud.required' => 'La fecha de solicitud es obligatoria.',
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
