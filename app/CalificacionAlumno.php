<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalificacionAlumno extends Model
{
    //
    protected $fillable = [
        'id','unidad1','unidad2','unidad3','unidad4','nivel1','nivel2','nivel3','nivel4','nivel5','nivel6','calificaciones_id'
    ];
}
