<?php

namespace App\Http\Requests;

use App\proveedores;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
                'required', 'min:8'
            ],
            'telefono' => [
                'required', 'min:8'
            ],
            'representante' => [
                'required', 'min:8'
            ],
            'direccion' => [
                'min:15'
            ],
            'correo' => [
                'min:14'
            ]
        ];
    }
}
