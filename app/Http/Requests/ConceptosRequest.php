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
                'required','min:1'
            ],
            'unidad' => [
                'required','min:1'
            ],
            'cantidad' => [
                'required','min:1'
            ],
            'pu' => [
                'required','min:1'
            ],
            'area' => [
                'required','min:1'
            ],
            'fk_id_proyecto' => [
                'required','min:1'
            ],
            'estado_conceptos' => [
                'required','min:1'
            ]
        ];
    }
}
