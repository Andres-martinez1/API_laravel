<?php

namespace App\Http\Requests\Usuario;

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
            'identificacion' => 'sometimes|required|numeric',
            'nombres' => 'sometimes|required|string',
            'apellidos' => 'sometimes|required|string',
            'correo' => 'sometimes|required|email',
            'password' => 'sometimes|required|string|min:6',
            'fk_id_area' => 'sometimes|required|exists:areas,id_area',
            'fk_id_rol' => 'sometimes|required|exists:roles,id_rol',
        ];
    }

    public function messages(): array
    {
        return [
            'identificacion.required' => 'La identificación es obligatoria.',
            'correo.email' => 'El correo no es válido.',
            'password.min' => 'La contraseña debe tener mínimo 6 caracteres.',
            'fk_id_area.exists' => 'Área no válida.',
            'fk_id_rol.exists' => 'Rol no válido.',
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
