<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       /* TODO: Scopes */

    public function scopeSearch($query,$name){
        if($name){

            return $query->where('name','LIKE',"%$name%");
        }else {
            return $query;
        }

    }

/*  TODO:*/

/* TODO: Busca alumnos */


    public function scopeSearchalumno($query,$name){
        if($name){

            return $query->where('name','LIKE',"%$name%")->join('datos_alumnos','users.id','=','datos_alumnos.user_id');
        }else{
            return $query->join('datos_alumnos','users.id','=','datos_alumnos.user_id');

        }

    }
/* TODO: ---------- */


/* TODO: Busca alumnos*grupo */


    public function scopeSearchalumnoxgrupo($query,$name){
        if($name){

            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id')->where('user_alum__grups.grup_id','=',$name)->join('calificacion_alumnos','users.id','=','calificacion_alumnos.calificaciones_id');
        }else{
            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id')->join('calificacion_alumnos','users.id','=','calificacion_alumnos.calificaciones_id');

        }

    }

    public function scopeSearchalumnoxgrupo_calif($query,$name){
        if($name){

            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id')->where('user_alum__grups.grup_id','=',$name)->join('datos_alumnos','users.id','=','datos_alumnos.user_id');
        }else{
            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id');

        }

    }


    public function scopeSearchalumnoxgrupo_califsonret($query,$name,$sexo,$origen){


        if($name){

            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id')->where('user_alum__grups.grup_id','=',$name)->join('datos_alumnos','users.id','=','datos_alumnos.user_id')->where('datos_alumnos.sexo','=',$sexo)->where('datos_alumnos.IntExt','=',$origen);
        }else{
            return $query->join('user_alum__grups','users.id','=','user_alum__grups.user_id');

        }

    }



/* TODO: ---------- */
}
