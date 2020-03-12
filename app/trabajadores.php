<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trabajadores extends Model
{
    //
    protected $table='trabajadores';
    protected $fillable = [
        'nombre', 'apellidos', 'telefono','domicilio','puesto',
    ];
}
