<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conceptos extends Model
{
    //
    protected $table='conceptos';
    protected $fillable = [
        'descripcion', 'unidad', 'cantidad','pu','area','fk_id_proyecto','estado_conceptos',
    ];
}
