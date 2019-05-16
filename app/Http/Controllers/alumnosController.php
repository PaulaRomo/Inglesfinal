<?php

namespace App\Http\Controllers;
use App\DatosAlumno;
use App\User;
use App\CalificacionAlumno;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class alumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      $busqueda=$request->input('search');
      if (empty($busqueda)) {
    $busqueda='';

      }
      //$users = DB::table('datos_alumnos as da')->join('users','users.id','=','da.user_id' )->get();
      $users=User::searchalumno($busqueda)->paginate(10);

      //dd($users);
      return view ('alumnos.index', compact('users','busqueda'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $datos = DatosAlumno::all();
      foreach ($datos as $key => $value) {
        if ($value->user_id==$id) {
        $alumno=$value;
        }
      }
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosAlumno $alumno)
    {
        $alumno->update($request->all());
        return redirect()->route('alumnos.index', $alumno->id)
        ->with('info', 'Alumno actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showcalificacion( $id)
    {


        $nombreAlumno=User::find($id);

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
        $datosAlumno['name']=$nombreAlumno['name'];
        $datosAlumno['calificaciones']=$calificacionAlumno;
        //echo "<br>";
        //echo "<br>";

        //return json_encode($datosAlumno);
        $datosAlumno = json_decode(json_encode($datosAlumno));

        //dd($datosAlumno);
        return view ('alumnos.showcalificacion',   compact('datosAlumno'));

    }

}
