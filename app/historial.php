<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    //
    protected $table='historial';
    protected $fillable = [
        'fk_id_usuario', 'accion','lugar',
    ];
}
