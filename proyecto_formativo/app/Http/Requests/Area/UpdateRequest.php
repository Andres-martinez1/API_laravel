<?php

namespace App\Http\Requests\Area;

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
            'nombre_area' => 'required|string',
            'fk_id_sedes' => 'required|exists:sedes,id_sedes',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_area.required' => 'El nombre del área es obligatorio.',
            'nombre_area.string' => 'El nombre del área debe ser una cadena de texto.',
            'fk_id_sedes.required' => 'Debe seleccionar una sede válida.',
            'fk_id_sedes.exists' => 'La sede seleccionada no existe en la base de datos.',
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
