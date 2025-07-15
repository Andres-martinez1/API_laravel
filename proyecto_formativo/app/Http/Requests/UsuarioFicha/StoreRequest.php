<?php

namespace App\Http\Requests\UsuarioFicha;

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
            'fk_id_usuario' => 'required|exists:usuarios,id_usuario',
            'fk_id_ficha' => 'required|exists:ficha,id_ficha',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_usuario.required' => 'El usuario es obligatorio.',
            'fk_id_usuario.exists' => 'El usuario no existe.',
            'fk_id_ficha.required' => 'La ficha es obligatoria.',
            'fk_id_ficha.exists' => 'La ficha no existe.',
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
