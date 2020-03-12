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
            'nombre_proyecto' => [
                'required', 'min:1'
            ],
            'tipo_proyecto' => [
                'required', 'min:1'
            ],
            'ubicacion' => [
                'required', 'min:1'
            ],
            'estado' => [
                'required', 'min:1'
            ],
            'fecha_inicio' => [
                'required', 'min:1'
            ],
            'fecha_fin' => [
                'required', 'min:1'
            ],
            'fk_id_lider' => [
                'required', 'min:1'
            ],
            'fk_id_cliente' => [
                'required', 'min:1'
            ]
        ];
    }
}
