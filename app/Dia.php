<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    //
    protected $fillable = [
        'lunes', 'martes', 'miercoles','jueves','viernes','sabado','grupos_id'
    ];
}
