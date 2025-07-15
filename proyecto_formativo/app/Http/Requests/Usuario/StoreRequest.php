<?php

namespace App\Http\Requests\Usuario;

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
            'identificacion' => 'required|numeric|unique:usuarios,identificacion',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:usuarios,correo',
            'password' => 'required|string|min:6',
            'fk_id_area' => 'required|exists:areas,id_area',
            'fk_id_rol' => 'required|exists:roles,id_rol',
        ];
    }

    public function messages(): array
    {
        return [
            'identificacion.required' => 'La identificación es obligatoria.',
            'identificacion.unique' => 'Esta identificación ya está registrada.',
            'correo.email' => 'El correo no tiene un formato válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.required' => 'El password es obligatorio.',
            'fk_id_area.exists' => 'El área seleccionada no existe.',
            'fk_id_rol.exists' => 'El rol seleccionado no existe.',
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
