<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    //
    protected $table='proyectos';
    protected $fillable = [
        'nombre', 'tipo_proyecto', 'ubicacion','estado','fecha_inicio','fecha_fin','fk_id_lider',
        'fk_id_cliente',
    ];
}
