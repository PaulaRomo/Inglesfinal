<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\User;
use App\Dia;
use App\Unidad_Periodo;
use App\UpdateDias;
use App\UpdateGrupos;
use App\UpdateAlum;
use App\UserAlum_Grup;
use App\UserDoc_Grup;
use App\DatosDocente;
use App\DatosAlumno;
use App\Periodo;
use Illuminate\Http\Request;
use App\Http\Requests\GruposCreateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Alert;
use Auth;

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
        $user = Auth::user();
        $hay=DB::table('datos_docentes')->where('user_id',$user->id)->pluck('id');
        if(count($hay)>0){
            $grupos = Grupo::all();
            return view ('grupos.index', compact('grupos'));   
        }else{
            $grupos = Grupo::paginate(10);
            return view ('grupos.index', compact('grupos'));
        }
    }

    public function periodo(Grupo $grupo)
    {
        return view ('grupos.periodo', compact('grupo'));
    }

    public function agregarPeriodo(Request $request,Grupo $grupo){
        $periodo1=$request['periodo1'];
        $periodo2=$request['periodo2'];
        $periodo3=$request['periodo3'];
        //dd($periodo1,$periodo2,$periodo3);
        $c1='';
        $c2='';
        $c3='';
        for($i=0;count($periodo1)>$i;$i++){
            $c1=$c1.$periodo1[$i].',';
        }
        for($i=0;count($periodo2)>$i;$i++){
            $c2=$c2.$periodo2[$i].',';
        }
        for($i=0;count($periodo3)>$i;$i++){
            $c3=$c3.$periodo3[$i].',';
        }
        $user=DB::table('unidad__periodos')->where('grup_id',$grupo->id)->pluck('perio_id');
        for($i=0;$i<count($user);$i++) {
            # code...
            $eliG=Unidad_Periodo::where('grup_id', '=', $grupo->id)->first();
            $eliG->delete();
        }
        if (count($periodo1)>0) {
            Unidad_Periodo::create([
                'grup_id'=>$grupo->id,
                'Unidades'=>$c1,
                'perio_id'=>1,
            ]);
        }
        if (count($periodo2)>0) {
            Unidad_Periodo::create([
                'grup_id'=>$grupo->id,
                'Unidades'=>$c2,
                'perio_id'=>2,
            ]);
        }
        if (count($periodo3)>0) {
            Unidad_Periodo::create([
                'grup_id'=>$grupo->id,
                'Unidades'=>$c3,
                'perio_id'=>3,
            ]);
        }
        $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();
        $users = User::all();

        $periodoxunidad =DB::table('unidad__periodos')->where('grup_id',$grupo->id)->pluck('Unidades');
        //$periodoxunidad = Unidad_Periodo::all()->where('grup_id',$grupo->id);
        //dd($periodoxunidad);
        $P1=[];
        $P2=[];
        $P3=[];
        if(count($periodoxunidad)>=1){
            $P1=explode(",", $periodoxunidad[0]);
        }if(count($periodoxunidad)>=2){
            $P2=explode(",", $periodoxunidad[1]);
        }if(count($periodoxunidad)>=3){
            $P3=explode(",", $periodoxunidad[2]);
        }
        $FechaPeri = Periodo::all();
        return view('grupos.show', compact('grupo','users','alumnosxGrupo','P1','P2','P3','FechaPeri'))
        ->with('success', 'Periodo guardado en el grupo');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GruposCreateRequest $request)
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
    public function store(GruposCreateRequest $request)
    {

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
     * Display the specified resource.F
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //

        //dd($grupo);

        $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();

        //dd($alumnosxGrupo);
        $users = User::all();
        //dd($users);
        //$periodoxunidad = Unidad_Periodo::all()->where('grup_id',$grupo->id);
        $periodoxunidad =DB::table('unidad__periodos')->where('grup_id',$grupo->id)->pluck('Unidades');
        //dd($periodoxunidad);
        $P1=[];
        $P2=[];
        $P3=[];
        if(count($periodoxunidad)>=1){
            $P1=explode(",", $periodoxunidad[0]);
        }if(count($periodoxunidad)>=2){
            $P2=explode(",", $periodoxunidad[1]);
        }if(count($periodoxunidad)>=3){
            $P3=explode(",", $periodoxunidad[2]);
        }
        $FechaPeri = Periodo::all();
        return view('grupos.show', compact('grupo','users','alumnosxGrupo','P1','P2','P3','FechaPeri'));
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
        $hay=DB::table('dias')->where('grupos_id',$grupo->id)->pluck('id');
        if(count($hay)==0){
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
                        # code
                        break;
                }
            } 
        }else{
            $eliG=Dia::where('grupos_id', '=', $grupo->id)->first();
            $eliG->delete();
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
                        # code
                        break;
                }
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

        //dd($request['unidad2']);
        //dd($datosaguardar);
       for ($i=0; $i < $tamano; $i++) {

        $datoalumno=[
            'unidad1'=>$datosaguardar['unidad1'][$i],
            'unidad2'=>$datosaguardar['unidad2'][$i],
            'unidad3'=>$datosaguardar['unidad3'][$i],
            'unidad4'=>$datosaguardar['unidad4'][$i],
            'unidad5'=>$datosaguardar['unidad5'][$i],
            'unidad6'=>$datosaguardar['unidad6'][$i],
            'unidad7'=>$datosaguardar['unidad7'][$i],
            'unidad8'=>$datosaguardar['unidad8'][$i],

            ] ;
        $calificaciones = DB::table('calificacion_alumnos')->where('calificaciones_id',$datosaguardar['calificaciones_id'][$i]);
        if ($datosaguardar['unidad1'][$i] >=70 && $datosaguardar['unidad2'][$i] >=70&& $datosaguardar['unidad3'][$i] >=70 && $datosaguardar['unidad4'][$i] >=70 && $datosaguardar['unidad5'][$i] >=70 && $datosaguardar['unidad6'][$i] >=70 && $datosaguardar['unidad7'][$i] >=70 && $datosaguardar['unidad8'][$i] >=70) {

            $calif=$datosaguardar['unidad1'][$i]+$datosaguardar['unidad2'][$i]+$datosaguardar['unidad3'][$i]+$datosaguardar['unidad4'][$i]+$datosaguardar['unidad5'][$i]+$datosaguardar['unidad6'][$i]+$datosaguardar['unidad7'][$i]+$datosaguardar['unidad8'][$i];
            $calif=intdiv($calif,8);
            $datoalumno[$datosaguardar['nivelActual']]=$calif;
            $datoalumno2 = [
            'unidad1'=>null,
            'unidad2'=>null,
            'unidad3'=>null,
            'unidad4'=>null,
            'unidad5'=>null,
            'unidad6'=>null,
            'unidad7'=>null,
            'unidad8'=>null,
            ];
            $calificaciones->update($datoalumno2);
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
        $idUs=DB::table('datos_alumnos')->where('numcontrol',$request['numcontrol'])->pluck('id');
        if(count($idUser)>0){
            $hay=DB::table('user_alum__grups')->where('user_id',$idUser[0])->pluck('user_id');
            $enGrup=DB::table('user_alum__grups')->where('grup_id',$grupo->id)->pluck('user_id');
            $capaciadGrup=DB::table('grupos')->where('id',$grupo->id)->pluck('capacidad');
            if($capaciadGrup[0]>count($enGrup)){
                if(count($hay)==0){
                    $act="1";
                    $apro = UpdateAlum::find($idUs[0]);
                    $apro->activo = $act;
                    $apro->save();
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
        }else{
            Alert::error('Error', 'Alumno '.$request['numcontrol'].' no esta registrado');
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
        $hay=DB::table('user_doc__grups')->where('grup_id',$grupo->id)->pluck('id');
        if(count($hay)==0){
            UserDoc_Grup::create([
                'user_id' => $docentes[$request['docente']],
                'grup_id' => $grupo->id,
            ]);
        }else{
            $eliG=UserDoc_Grup::where('grup_id', '=', $grupo->id)->first();
            $eliG->delete();UserDoc_Grup::create([
                'user_id' => $docentes[$request['docente']],
                'grup_id' => $grupo->id,
            ]);
        }
        return redirect()->route('grupos.index', $grupo->id)
        ->with('info', 'Docente agregado al grupo');
    }

   public function pdf(Grupo $grupo)
    {
        $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();
        $datos=DatosAlumno::all();
        $final=[];
        foreach ($alumnosxGrupo as $key => $fila) {
          foreach ($datos as $k => $value) {
            if ($value['id']==$fila['id']) {
              $final[]=$value;
            }
          }
        }
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('grupos.pdf',  compact('grupo','today','alumnosxGrupo','final'));

        return $pdf->download('Reporte del grupo '.$grupo->nombre_grupo.'.pdf');
    }


       public function pdfin(Grupo $grupo)
        {
            $alumnosxGrupo=User::searchalumnoxgrupo($grupo->id)->get();
            $datos=DatosAlumno::all();
            $final=[];
            foreach ($alumnosxGrupo as $key => $fila) {
              foreach ($datos as $k => $value) {
                if ($value['id']==$fila['id']) {
                  $final[]=$value;
                }
              }
            }
            $today = Carbon::now()->format('d/m/Y');
            $pdf = \PDF::loadView('grupos.pdfin',  compact('grupo','today','alumnosxGrupo','final'));

            return $pdf->download('ejemplo.pdf');
        }

        public function pdfalumno()
         {
           $today = Carbon::now()->format('d/m/Y');

           $grupos = DB::table('grupos')->select('id', 'nombre_grupo','nivel')->orderBy('nivel')->get();

           foreach ($grupos as $grupo) {

                  $alumnosFex=User::searchalumnoxgrupo_califsonret($grupo->id,'F','externo');
                  /* alumnos */
                  $alumnosM=User::searchalumnoxgrupo_califsonret($grupo->id,'M','interno');
                  $alumnosF=User::searchalumnoxgrupo_califsonret($grupo->id,'F','interno');

                  /* externos */
                  $alumnosMex=User::searchalumnoxgrupo_califsonret($grupo->id,'M','externo');
                  $alumnosFex=User::searchalumnoxgrupo_califsonret($grupo->id,'F','externo');

                  /* total */
                  $alumnos=User::searchalumnoxgrupo_calif($grupo->id);
                  //agregar resultados a grupos

                  $grupo->alumnos=$alumnosM->get()->count();
                  $grupo->alumnas=$alumnosF->get()->count();
                  $grupo->alumnosex=$alumnosMex->get()->count();
                  $grupo->alumnasex=$alumnosFex->get()->count();
                  $grupo->alumnostot=$alumnos->get()->count();
                  $grupo->subtotal="";

           }

           $arrayFinal = array( );
           $totales = array( );
           $sumanivel="I";

           //dd($grupos);
           $totales["id"]="";
           $totales["nombre_grupo"]="Totales";
           $totales["nivel"]="I";
           $totales["alumnos"]=0;
           $totales["alumnas"]=0;
           $totales["alumnosex"]=0;
           $totales["alumnasex"]=0;
           $totales["alumnostot"]="";
           $totales["subtotal"]=0;
           foreach ($grupos  as $grupo) {


                    if ($grupo->nivel!=$sumanivel   ) {
                        $sumanivel=$grupo->nivel;
                        $arrayFinal[]=$totales;
                        $totales = array( );

                        $totales["id"]="-";
                        $totales["nombre_grupo"]="";
                        $totales["nivel"]="-";
                        $totales["alumnos"]="-";
                        $totales["alumnas"]="-";
                        $totales["alumnosex"]="-";
                        $totales["alumnasex"]="-";
                        $totales["alumnostot"]="-";
                        $totales["subtotal"]="-";

                        $arrayFinal[]=$totales;
                        $totales["id"]="";
                        $totales["nombre_grupo"]="Totales";
                        $totales["nivel"]=$sumanivel;
                        $totales["alumnos"]=0;
                        $totales["alumnas"]=0;
                        $totales["alumnosex"]=0;
                        $totales["alumnasex"]=0;
                        $totales["alumnostot"]="";
                        $totales["subtotal"]=0;


                    }
                    $totales["alumnos"]+=$grupo->alumnos;

                    $totales["alumnas"]+=$grupo->alumnas;
                    $totales["alumnosex"]+=$grupo->alumnosex;
                    $totales["alumnasex"]+=$grupo->alumnasex;
                    $totales["alumnostot"]="";
                    $totales["subtotal"]+=$grupo->alumnostot;

                    $arrayFinal[]=$grupo;



           }
           $arrayFinal[]=$totales;
            $arrayFinal=json_decode(json_encode($arrayFinal),true);
            $totaldealumnos=DB::table('user_alum__grups')->count();


            $pdf = \PDF::loadView('grupos.pdfalumo',  compact('today','arrayFinal','totaldealumnos'));

            return $pdf->download('Inscripciones.pdf');
         }


    /*
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
        dd($grupo);
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
            $act="0";
            $apro = UpdateAlum::find($user[$i]);
            $apro->activo = $act;
            $apro->save();
            $eliG=UserAlum_Grup::where('grup_id', '=', $grupo->id)->first();
            $eliG->delete();
        }
        $user=DB::table('unidad__periodos')->where('grup_id',$grupo->id)->pluck('perio_id');
        for($i=0;$i<count($user);$i++) {
            # code...
            $eliG=Unidad_Periodo::where('grup_id', '=', $grupo->id)->first();
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
