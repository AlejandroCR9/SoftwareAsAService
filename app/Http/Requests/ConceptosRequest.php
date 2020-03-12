<?php

namespace App\Http\Requests;

use App\conceptos;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ConceptosRequest extends FormRequest
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
            'descripcion' => [
                'required'
            ],
            'unidad' => [
                'required'
            ],
            'cantidad' => [
                'required'
            ],
            'pu' => [
                'required'
            ],
            'area' => [
                'required'
            ],
            'fk_id_proyecto' => [
                'required'
            ],
            'estado' => [
                'required'
            ]
        ];
    }
}
