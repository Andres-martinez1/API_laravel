<?php

namespace App\Http\Requests\Ficha;

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
            'numero_ficha' => 'sometimes|required|string|max:20|unique:ficha,numero_ficha,' . $this->route('id'),
            'fk_id_programa' => 'sometimes|required|exists:programas,id_programa',
            'fk_id_municipio' => 'sometimes|required|exists:municipio,id_municipio',
            'fk_id_sede' => 'sometimes|required|exists:sedes,id_sedes',
        ];
    }

    public function messages(): array
    {
        return [
            'numero_ficha.unique' => 'Este número de ficha ya existe.',
            'fk_id_programa.exists' => 'Programa no válido.',
            'fk_id_municipio.exists' => 'Municipio no válido.',
            'fk_id_sede.exists' => 'Sede no válida.',
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
