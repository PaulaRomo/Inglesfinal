<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\User;
use App\Dia;
use App\UpdateDias;
use App\UpdateGrupos;
use App\UserAlum_Grup;
use App\UserDoc_Grup;
use App\DatosDocente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use File;
use Filesystem;
use Alert;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $grupos = Grupo::paginate(10);
        return view ('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }
    /* TODO: NACHO{ */
        public function balum( $numcontrol  )
        {
            $idUser=DB::table('datos_alumnos')->where('numcontrol',$numcontrol)->join('users','users.id','=','datos_alumnos.user_id') ->get();

            return json_encode($idUser);
        }
    /* TODO: }NACHO */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        // example:

        $grupo = Grupo::create([
          'nombre_grupo' => $request['nombre_grupo'],
          'periodo' => $request['periodo'],
          'nivel' => $request['nivel'],
          'docente' => $request['docente'],
          'capacidad' => $request['capacidad'],
        ]);

        return redirect()->route('grupos.index', $grupo->id)
        ->with('success', 'Grupo guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //

        //dd($grupo);

        $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();

        $users = User::all();

        //dd($alumnosxGrupo);
        return view('grupos.show', compact('grupo','users','alumnosxGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //

        return view('grupos.edit', compact('grupo'));
    }

    public function dias(Grupo $grupo)
    {
        $users = User::all();
        $doc = DatosDocente::all();
        $docentes=array();
        $i=0;
        foreach ($doc as $d) {
            foreach ($users as $use) {
                if($d->user_id==$use->id){
                    //echo($d.' '.$use->id);
                    $docentes[$i]=$use->name;
                    $i++;
                }
            }
        }
        //dd($docentes);
        //dd($grupo);
        return view('dias.create',compact('grupo','docentes'));
    }

    public function agreDias(Request $request,Grupo $grupo)
    {
        //
        foreach ($request['dias'] as $dia) {
            # code...
            switch ($dia) {
                case 'Lunes':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->lunes = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'lunes' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                case 'Martes':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->martes = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'martes' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                case 'Miercoles':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->miercoles = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'miercoles' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                case 'Jueves':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->jueves = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'jueves' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                case 'Viernes':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->viernes = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'viernes' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                case 'Sabado':
                    # code...
                    $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
                    if(count($hay)>0){
                        $apro = UpdateDias::find($hay[0]);
                        $apro->sabado = $request['horainicio'].'-'.$request['horafin'];
                        $apro->save();
                    }else{
                        Dia::create([
                            'sabado' => $request['horainicio'].' a '.$request['horafin'],
                            'grupos_id' => $grupo->id,
                          ]);
                    }
                    break;
                default:
                    # code...

                    break;
            }
        }
        return redirect()->route('grupos.index', $grupo->id)
        ->with('success', 'Horario agregado al grupo');
    }

    /* Calificaciones */

    public function guardarCalificaciones(Request $request){

        $datosaguardar=$request->all();
        unset($datosaguardar['_token']);
        unset($datosaguardar['_method']);

        $datosaguardar['calificaciones_id']=$datosaguardar['user_id'];
        unset($datosaguardar['user_id']);
        $tamano=count($datosaguardar['calificaciones_id']);

    //    /dd($tamano);

       for ($i=0; $i < $tamano; $i++) {

        $datoalumno=[
            'unidad1'=>$datosaguardar['unidad1'][$i],
            'unidad2'=>$datosaguardar['unidad2'][$i],
            'unidad3'=>$datosaguardar['unidad3'][$i],
            'unidad4'=>$datosaguardar['unidad4'][$i] ] ;
        $calificaciones = DB::table('calificacion_alumnos')->where('calificaciones_id',$datosaguardar['calificaciones_id'][$i]);

        if ($datosaguardar['unidad1'][$i] !=null || $datosaguardar['unidad2'][$i] !=null || $datosaguardar['unidad3'][$i] !=null || $datosaguardar['unidad4'][$i] !=null) {

            $calif=$datosaguardar['unidad1'][$i]+$datosaguardar['unidad2'][$i]+$datosaguardar['unidad3'][$i]+$datosaguardar['unidad4'][$i];
            $calif=intdiv($calif,4);
            $datoalumno[$datosaguardar['nivelActual']]=$calif;

        }

        $calificaciones->update($datoalumno);
       }
       return back();




    }
    public function agregarCalificaciones($id){

         $users=User::searchalumnoxgrupo($id)->get();
         //dd($users);
         $grupos=$id;

         return view('grupos.agregaCalificaciones', compact('users','grupos'));


    }
    public function agreAlum(Request $request,Grupo $grupo)
    {
        $idUser=DB::table('datos_alumnos')->where('numcontrol',$request['numcontrol'])->pluck('user_id');
        $hay=DB::table('user_alum__grups')->where('user_id',$idUser[0])->pluck('user_id');
        $enGrup=DB::table('user_alum__grups')->where('grup_id',$grupo->id)->pluck('user_id');
        $capaciadGrup=DB::table('grupos')->where('id',$grupo->id)->pluck('capacidad');
        if($capaciadGrup[0]>count($enGrup)){
            if(count($hay)==0){
                UserAlum_Grup::create([
                    'user_id' => $idUser[0],
                    'grup_id' => $grupo->id,
                ]);
                $apro = UpdateGrupos::find($grupo->id);
                $apro->save();

                /* TODO: agregar nivel actual a tabla calificacionesalumno */
                $nivelactual=array_search($grupo->nivel,['I','II',"III","IV","V","VI"]);
                $nivelactual+=1;


                $calificaciones = DB::table('calificacion_alumnos')->where('calificaciones_id',$idUser[0])
                ->update([
                'nivelActual'=>$nivelactual,
                'unidad1'=>null,
                'unidad2'=>null,
                'unidad3'=>null,
                'unidad4'=>null,
                ]);
                return redirect()->route('grupos.index', $grupo->id)
                ->with('info', 'Alumno agregado al grupo');
            }else{
                Alert::error('Error', 'Alumno ya registrado a un grupo');
            }
        }else{
            Alert::info('Imposible inscribirse', 'Grupo lleno');
        }
        return redirect()->route('grupos.index', $grupo->id);
    }

    public function agreDoc(Request $request,Grupo $grupo)
    {
        $users = User::all();
        $doc = DatosDocente::all();
        $docentes=array();
        $i=0;
        foreach ($doc as $d) {
            foreach ($users as $use) {
                if($d->user_id==$use->id){
                    //echo($d.' '.$use->id);
                    $docentes[$i]=$use->id;
                    $i++;
                }
            }
        }
        UserDoc_Grup::create([
            'user_id' => $docentes[$request['docente']],
            'grup_id' => $grupo->id,
        ]);
        return redirect()->route('grupos.index', $grupo->id)
        ->with('info', 'Docente agregado al grupo');
    }

    public function pdf(Grupo $grupo)
    {
        $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('grupos.pdf',  compact('grupo','today','alumnosxGrupo'));
        return $pdf->download('ejemplo.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */

     public function documentacion(Request $request, Grupo $grupo)
     {
       //dd($_FILES["file"]["name"]);
       $documento=$_FILES["file"]["tmp_name"];
       $destino="instrumentacion/".$_FILES["file"]["name"];
       move_uploaded_file($documento,$destino);
       $guardar=updateGrupos::find($grupo->id);
       $guardar->instrumentacion=$destino;
       $guardar->save();
       return redirect()->route('grupos.index', $grupo->id)
       ->with('info', 'Grupo actualizado');
     }

     public function docu(Grupo $grupo)
     {
       return view ('grupos.documento', compact('grupo'));
     }

    public function update(Request $request, Grupo $grupo)
    {
        //dd($grupo);
        $grupo->update($request->all());
        /* TODO:nacho */
        $nivelactual=array_search($grupo->nivel,['I','II',"III","IV","V","VI"]);
        $nivelactual+=1;

        $var=DB::table('calificacion_alumnos')
        ->join('user_alum__grups', 'user_alum__grups.user_id', '=', 'calificacion_alumnos.calificaciones_id')
        ->where('user_alum__grups.grup_id','=',$grupo->id)->update([ 'nivelActual' => $nivelactual ]);
        //dd($var->get());
        return redirect()->route('grupos.index', $grupo->id)
        ->with('success', 'Grupo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
        //dd($grupo);
        // example:
        // example:

        $user=DB::table('user_alum__grups')->where('grup_id',$grupo->id)->pluck('user_id');
        for($i=0;$i<count($user);$i++) {
            # code...
            $eliG=UserAlum_Grup::where('grup_id', '=', $grupo->id)->first();
            $eliG->delete();
        }
        $eliG=UserAlum_Grup::where('grup_id', '=', $grupo->id)->first();
        if($eliG!=null){
            $eliG->delete();
        }
        $eliG=UserDoc_Grup::where('grup_id', '=', $grupo->id)->first();
        if($eliG!=null){
            $eliG->delete();
        }
        $eliG=Dia::where('grupos_id', '=', $grupo->id)->first();
        if($eliG!=null){
            $eliG->delete();
        }
        $grupo->delete();

        return back()->with('success', 'Eliminado correctamente');
    }
}
