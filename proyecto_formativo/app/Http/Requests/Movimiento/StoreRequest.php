<?php

namespace App\Http\Requests\Movimiento;

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
            'fk_id_elemento' => 'required|exists:elementos,id_elemento',
            'fecha' => 'required|date',
            'responsable' => 'required|string',
            'pedir' => 'required|string',
            'suministrar' => 'required|string',
            'devolver' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'fk_id_usuario.required' => 'El campo usuario es obligatorio.',
            'fk_id_usuario.exists' => 'El usuario no existe.',
            'fk_id_elemento.required' => 'El campo elemento es obligatorio.',
            'fk_id_elemento.exists' => 'El elemento no existe.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'Debe ser una fecha válida.',
            'responsable.required' => 'El responsable es obligatorio.',
            'pedir.required' => 'El campo pedir es obligatorio.',
            'suministrar.required' => 'El campo suministrar es obligatorio.',
            'devolver.required' => 'El campo devolver es obligatorio.',
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
