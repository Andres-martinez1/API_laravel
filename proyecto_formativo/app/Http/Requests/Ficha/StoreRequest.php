<?php

namespace App\Http\Requests\Ficha;

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
            'numero_ficha' => 'required|string|max:20|unique:ficha,numero_ficha',
            'fk_id_programa' => 'required|exists:programas,id_programa',
            'fk_id_municipio' => 'required|exists:municipio,id_municipio',
            'fk_id_sede' => 'required|exists:sedes,id_sedes',
        ];
    }

    public function messages(): array
    {
        return [
            'numero_ficha.required' => 'El número de ficha es obligatorio.',
            'numero_ficha.unique' => 'Esta ficha ya existe.',
            'fk_id_programa.required' => 'El programa es obligatorio.',
            'fk_id_programa.exists' => 'El programa no existe.',
            'fk_id_municipio.required' => 'El municipio es obligatorio.',
            'fk_id_municipio.exists' => 'El municipio no existe.',
            'fk_id_sede.required' => 'La sede es obligatoria.',
            'fk_id_sede.exists' => 'La sede no existe.',
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
