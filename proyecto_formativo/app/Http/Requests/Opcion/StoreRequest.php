<?php

namespace App\Http\Requests\Opcion;

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
            'nombre_opcion' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'ruta' => 'required|string|max:150',
            'id_modulo' => 'nullable|exists:modulos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_opcion.required' => 'El nombre de la opción es obligatorio.',
            'ruta.required' => 'La ruta es obligatoria.',
            'id_modulo.exists' => 'El módulo seleccionado no existe.',
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
