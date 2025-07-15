<?php

namespace App\Http\Requests\Area;

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
            'nombre_area' => 'required|string|max:255',
            'fk_id_sedes' => 'required|exists:sedes,id_sedes',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_area.required' => 'El nombre del área es obligatorio.',
            'fk_id_sedes.required' => 'Debe seleccionar una sede.',
            'fk_id_sedes.exists' => 'La sede seleccionada no existe.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Errores de validación',
            'errors' => $validator->errors(),
        ], 422));
    }
}
