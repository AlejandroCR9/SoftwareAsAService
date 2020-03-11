<?php

namespace App\Http\Requests;

use App\trabajadores;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrabajadoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => [
                'required', 'min:3'
            ],
            'apellidos' => [
                'required', 'min:5'
            ],
            'telefono' => [
                'required', 'min:10'
            ],
            'domicilio' => [
                'required', 'min:15'
            ],
            'puesto' => [
                'required', 'min:5'
            ]
        ];
    }
}
