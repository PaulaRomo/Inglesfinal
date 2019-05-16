<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $table = 'grupos';

    protected $fillable =['nombre_grupo','periodo','nivel','docente','dias','horainicio', 'horafin', 'capacidad'];
}
