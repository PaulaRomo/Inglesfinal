<?php

namespace App\Http\Controllers;

use App\User;
use App\DatosAlumno;
use App\DatosDocente;
use App\UserAlum_Grup;
use App\UserDoc_Grup;
use App\CalificacionAlumno;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        //
        //dd($request);
        \App\User::create([
            'name'=>$request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
       //$user = User::create($request->all());
        $us=DB::table('users')->where('name',$request['name'])->pluck('id');
        \App\DatosAlumno::create([
            'IntExt'=>$request['IntExt'],
            'numcontrol' => $request['numcontrol'],
            'sexo'=>$request['sexo'],
            'activo'=>'1',
            'carrera'=>$request['carrera'],
            'semestre'=>$request['semestre'],
            'user_id'=>$us[0]
        ]);
        /* TODO: crear calificaciones de alumno */
        CalificacionAlumno::create([

            'calificaciones_id'=>$us[0]
        ]);


        //$user=DB::table('users');
        $user = User::paginate(10);
        //dd($user);
        return redirect()->route('users.index', $user)
        ->with('info', 'Ususrio guardado');
    }

    public function storeD(Request $request)
    {
        //
        //dd($request);
        \App\User::create([
            'name'=>$request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
       //$user = User::create($request->all());
        $us=DB::table('users')->where('name',$request['name'])->pluck('id');
        \App\DatosDocente::create([
            'numcontrol' => $request['numcontrol'],
            'user_id'=>$us[0]
        ]);
        //$user=DB::table('users');
        $user = User::paginate(10);
        //dd($user);
        return redirect()->route('users.index', $user)
        ->with('info', 'Ususrio guardado');
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
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
        ->with('info', 'Usuario actualizado');
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
            $eliA->delete();
            $eliA2=CalificacionAlumno::where('calificaciones_id', '=', $user->id)->first();
            $eliA2->delete();
            $eliA3=DatosAlumno::where('user_id', '=', $user->id)->first();
            $eliA3->delete();
            $user->delete();
            return back()->with('info', 'Eliminado correctamente');
        }
        $idUser=DB::table('Datos_Docentes')->where('user_id',$user->id)->pluck('id');
        if(count($idUser)>0){
            $eliD=UserDoc_Grup::where('user_id', '=', $user->id)->first();
            $eliD->delete();
            $eliD=Datosdocente::where('user_id', '=', $user->id)->first();
            $eliD->delete();
            $user->delete();
            return back()->with('info', 'Eliminado correctamente');
        }
        $idUser=DB::table('users')->where('id',$user->id)->pluck('id');
        dd($idUser);
        if(count($idUser)>0){
            $user->delete();
            return back()->with('info', 'Eliminado correctamente');
        }
    }
}
