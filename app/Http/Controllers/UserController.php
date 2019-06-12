<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use App\DatosAlumno;
use App\DatosDocente;
use App\UserAlum_Grup;
use App\UserDoc_Grup;
use App\CalificacionAlumno;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AlumnosCreateRequest;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        //TODO:
        //
        $busqueda=$request->input('search');
        $users = User::search($busqueda)->paginate(10);

    return view ('users.index', compact('users','busqueda'));
        //TODO:
    }



    public function show(User $user)
    {
        $datos = DatosAlumno::all();
        foreach ($datos as $key => $value) {
          if ($value->user_id==$user->id) {
          $datos=$value;
          }
        }
        return view('alumnos.show', compact('user','datos'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnosCreateRequest $request)
    {
        $user = User::create($request->all());
        $us=DB::table('users')->where('name',$request['name'])->pluck('id');
        $dalum= new DatosAlumno();
            $dalum->IntExt=$request->input('IntExt');
            $dalum->numcontrol=$request->input('numcontrol');
            $dalum->sexo=$request->input('sexo');
            $dalum->activo='randol';
            $dalum->carrera=$request->input('carrera');
            $dalum->semestre=$request->input('semestre');
            $dalum->user_id=$us[0];
            $dalum->save();

        $rol= new Roles();
            $rol->role_id=3;
            $rol->user_id=$us[0];
            $rol->save();
        /* crear calificaciones de alumno */
        $cali=new CalificacionAlumno();
            $cali->calificaciones_id=$us[0];
            $cali->save();


        return redirect()->route('users.index', $user)
        ->with('success', 'Usuario guardado');
    }

    public function storeD(AlumnosCreateRequest $request)
    {
        $user = User::create($request->all());
        $us=DB::table('users')->where('name',$request['name'])->pluck('id');
        $ddatos=new DatosDocente();
            $ddatos->numcontrol = $request->input('numcontrol');
            $ddatos->user_id=$us[0];
            $ddatos->save();
        $rol= new Roles();
            $rol->role_id=2;
            $rol->user_id=$us[0];
            $rol->save(0);

        return redirect()->route('users.index', $user)
        ->with('success', 'Usuario guardado');
    }
    public function storeU(UserRequest $request)
    {
        $user = new User();
        $user -> name =$request->input('name');
        $user -> email =$request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('users.index', $user)
        ->with('success', 'Usuario guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        //dd($user);

        $roles = Role::get();
        return view('users.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnosCreateRequest $request, User $user)
    {
        //
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
        ->with('success', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //eliminar un alumno
        $idUser=DB::table('Datos_Alumnos')->where('user_id',$user->id)->pluck('id');
        //dd($idUser);
        if(count($idUser)>0){
            $eliA=UserAlum_Grup::where('user_id', '=', $user->id)->first();
            if($eliA!=null){
                $eliA->delete();
            }
            $eliA=CalificacionAlumno::where('calificaciones_id', '=', $user->id)->first();
            if($eliA!=null){
                $eliA->delete();
            }
            $eliA=DatosAlumno::where('user_id', '=', $user->id)->first();
            if($eliA!=null){
                $eliA->delete();
            }
            $user->delete();
            return back()->with('success', 'Eliminado correctamente');
        }
        $idUser=DB::table('Datos_Docentes')->where('user_id',$user->id)->pluck('id');
        if(count($idUser)>0){
            $eliD=UserDoc_Grup::where('user_id', '=', $user->id)->first();
            if($eliD!=null){
                $eliD->delete();
            }
            $eliD=Datosdocente::where('user_id', '=', $user->id)->first();
            if($eliD!=null){
                $eliD->delete();
            }
            $user->delete();
            return back()->with('success', 'Eliminado correctamente');
        }
        $idUser=DB::table('users')->where('id',$user->id)->pluck('id');
        if(count($idUser)>0){
            $user->delete();
            return back()->with('success', 'Eliminado correctamente');
        }
    }
}
