<?php

namespace App\Http\Requests;

use App\proyectos;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProyectosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'required'
            ],
            'tipo_proyecto' => [
                'required'
            ],
            'ubicacion' => [
                'required'
            ],
            'estado' => [
                'required'
            ],
            'fecha_inicio' => [
            ],
            'fecha_fin' => [
            ],
            'fk_id_lider' => [
                'required'
            ],
            'fk_id_cliente' => [
                'required'
            ]
        ];
    }
}
