<?php

namespace App\Http\Requests\DetalleEntrega;

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
            'id_entrega' => 'required|exists:entrega_material,id_entrega',
            'id_instructor_receptor' => 'required|exists:usuarios,id_usuario',
            'id_ficha_formacion' => 'required|exists:ficha,id_ficha',
            'visto_bueno_aprendiz' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_entrega.required' => 'El ID de entrega es obligatorio.',
            'id_entrega.exists' => 'La entrega especificada no existe.',
            'id_instructor_receptor.required' => 'El instructor receptor es obligatorio.',
            'id_instructor_receptor.exists' => 'El instructor no existe.',
            'id_ficha_formacion.required' => 'La ficha de formación es obligatoria.',
            'id_ficha_formacion.exists' => 'La ficha no existe.',
            'visto_bueno_aprendiz.required' => 'El campo visto bueno es obligatorio.',
            'visto_bueno_aprendiz.boolean' => 'El campo visto bueno debe ser verdadero o falso.',
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
