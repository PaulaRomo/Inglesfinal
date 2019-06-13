<?php

namespace App\Http\Controllers;
use App\DatosAlumno;
use App\User;
use App\UpdateAlum;
use App\CalificacionAlumno;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Carbon\Carbon;
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

    public function pdfCarrera(Request $request)
    {
      $carre=$request['carrera'];
      $seme=$request['semestre'];
      $gru=$request['carrera'];
      $datos=DatosAlumno::all();
      $final=[];
      $cali=CalificacionAlumno::all();
      $user=User::all();
      $finalcali=[];
      $al=[];
      foreach ($datos as $key => $value) {
        if ($value['carrera']==$carre && $value['semestre']==$seme && $value['activo']!='') {
          foreach ($cali as $ke => $va) {
            if ($va['calificaciones_id']==$value['user_id']) {
              foreach ($user as $k => $v) {
                if ($value['user_id']==$v['id']) {
                  $al[]=$v;
                }
              }
              $finalcali[]=$va;
            }
          }
          $final[]=$value;
        }
      }
      $today = Carbon::now()->format('d/m/Y');

      $pdf = \PDF::loadView('alumnos.pdfCarrera',  compact('today','final','gru','finalcali','al'));
      return $pdf->download('Reporte de ingles de '.$carre.' '.$seme.'.pdf');
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
    public function update(FileRequest $request, DatosAlumno $alumno)
    {   if($request->hasFile('file')){
          $file=$request->file('file');
          $name=time().$file->getClientOriginalName();
          $file->move(public_path().'/certificados/', $name);
          $apro = UpdateAlum::find($request['idU']);
          $apro->path_certificado=$name;
          $apro->save();
        }
        $apro = UpdateAlum::find($request['idU']);
        $apro->numcontrol=$request['numcontrol'];
        $apro->sexo=$request['sexo'];
        $apro->carrera=$request['carrera'];
        $apro->semestre=$request['semestre'];
        $apro->save();
        return redirect()->route('alumnos.index', $alumno->id)
        ->with('success', 'Alumno actualizado');
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
        return view ('alumnos.showcalificacion',   compact('datosAlumno'))->with('success', 'Eliminado correctamente');

    }

}
