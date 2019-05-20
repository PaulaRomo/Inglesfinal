<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad_Periodo extends Model
{
    //
    protected $table = 'unidad__periodos';
    
    protected $fillable = [
        'grup_id', 'Unidades', 'perio_id'
    ];

}
