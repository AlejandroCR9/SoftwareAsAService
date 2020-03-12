<?php

namespace App\Http\Requests;

use App\historial;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HistorialRequest extends FormRequest
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
            'fk_id_usuario' => [
                'required'
            ],
            'accion' => [
                'required'
            ],
            'lugar' => [
                'required'
            ]
        ];
    }
}
