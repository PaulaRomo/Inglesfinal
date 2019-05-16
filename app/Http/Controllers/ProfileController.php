<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DatosAlumno;
use App\User;
use App\CalificacionAlumno;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    public function profile(){
      $nombreAlumno=Auth::user();
      $id=Auth::user()->id;
      $datosAlumno=DatosAlumno::where('user_id',$id);
      $datosAlumno = DB::table('datos_alumnos')->where('user_id', $id)->first();
      $calificacionAlumno=CalificacionAlumno::find($id);
      $calificacionAlumno = DB::table('calificacion_alumnos')->where('calificaciones_id', $id)->first();

      if ($calificacionAlumno==Null) {

          CalificacionAlumno::create([
              'calificaciones_id'=>$id,
          ]);
      $calificacionAlumno = DB::table('calificacion_alumnos')->where('calificaciones_id', $id)->first();


      }
      $datosAlumno = json_decode(json_encode($datosAlumno), true);
      $datosAlumno['name']=Auth::user()->name;
      $datosAlumno['calificaciones']=$calificacionAlumno;
      //echo "<br>";
      //echo "<br>";

      //return json_encode($datosAlumno);
      $datosAlumno = json_decode(json_encode($datosAlumno));
      //dd($datosAlumno);
      $user=Auth::user();
      return view ('profile', compact('user','datosAlumno'));
    }
}
