<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class planos extends Model
{
    //
    protected $table='planos';
    protected $fillable = [
        'plano', 'fk_id_proyecto',
    ];
}
