<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dias', 'DiasController');



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){

  //acceso a roles

  Route::post('roles/store', 'RoleController@store')->name('roles.store')
  ->middleware('permission:roles.create');

  Route::get('roles', 'RoleController@index')->name('roles.index')
  ->middleware('permission:roles.index');

  Route::get('roles/create', 'RoleController@create')->name('roles.create')
  ->middleware('permission:roles.create');

  Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
  ->middleware('permission:roles.edit');

  Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
  ->middleware('permission:roles.show');

  Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
  ->middleware('permission:roles.destroy');

  Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
  ->middleware('permission:roles.edith');

  //acceso a grupos

  Route::get('/grupos/{grupo}/lista', 'GrupoController@excel')->name('grupos.excel')
  ->middleware('permission:grupos.show');

  Route::post('grupos/store', 'GrupoController@store')->name('grupos.store')
  ->middleware('permission:grupos.create');

  Route::get('grupos', 'GrupoController@index')->name('grupos.index')
  ->middleware('permission:grupos.index');

  Route::get('grupos/create', 'GrupoController@create')->name('grupos.create')
  ->middleware('permission:grupos.create');

  Route::put('grupos/{grupo}', 'GrupoController@update')->name('grupos.update')
  ->middleware('permission:grupos.edit');

  Route::get('grupos/{grupo}', 'GrupoController@show')->name('grupos.show')
  ->middleware('permission:grupos.show');
/* agregar calificacion */

  Route::get('grupos/{grupo}/calificaciones/', 'GrupoController@agregarCalificaciones')->name('grupos.agregarCalificaciones')
  ->middleware('permission:grupos.agregarCalificaciones');

  Route::put('grupos/{grupo}/calificaciones/guardar', 'GrupoController@guardarCalificaciones')->name('grupos.guardarCalificaciones')
  ->middleware('permission:grupos.guardarCalificaciones');




  Route::delete('grupos/{grupo}', 'GrupoController@destroy')->name('grupos.destroy')
  ->middleware('permission:grupos.destroy');

  Route::put('grupos/{grupo}/remove/', 'GrupoController@removeralumno')->name('grupos.removeralumno')
  ->middleware('permission:grupos.destroy');

  Route::get('grupos/{grupo}/edit', 'GrupoController@edit')->name('grupos.edit')
  ->middleware('permission:grupos.edith');

  Route::put('grupos/{grupo}/documento/intru', 'GrupoController@documentacion')->name('grupos.intrumentacion');

  Route::get('grupos/{grupo}/documento', 'GrupoController@docu')->name('grupos.documento');

  Route::get('grupos/{grupo}/pdf', 'GrupoController@pdf')->name('grupos.pdf');

  Route::get('grupos/genere/pdfalumno', 'GrupoController@pdfalumno')->name('grupos.pdfalumno');

  Route::get('grupos/{grupo}/pdfin', 'GrupoController@pdfin')->name('grupos.pdfin');




  Route::get('grupos/{grupo}/agregar', 'GrupoController@dias')->name('grupos.dias')
  ->middleware('permission:grupos.agreDias');

  Route::put('grupos/{grupo}/agregar/dias', 'GrupoController@agreDias')->name('grupos.agreDias')
  ->middleware('permission:grupos.agreDias');

  Route::put('grupos/{grupo}/agregar/alum', 'GrupoController@agreAlum')->name('grupos.agreAlum')
  ->middleware('permission:grupos.agreDias');

  Route::get('grupos/{grupo}/agregar/alum/b', 'GrupoController@balum')->name('grupos.balum')
  ->middleware('permission:grupos.agreDias');

  Route::put('grupos/{grupo}/agregar/doc', 'GrupoController@agreDoc')->name('grupos.agreDoc')
  ->middleware('permission:grupos.agreDias');

  //acceso a periodo
  Route::get('grupos/{grupo}/agregarPeriodos', 'GrupoController@periodo')->name('grupos.periodo')
  ->middleware('permission:users.index');

  Route::put('grupos/{grupo}/agregar/Periodo', 'GrupoController@agregarPeriodo')->name('grupos.guardarPeriodo')
  ->middleware('permission:grupos.idex');

  Route::get('periodos', 'PeriodoController@index')->name('periodo.index')
  ->middleware('permission:users.index');

  Route::get('periodos/{periodo}/edit', 'PeriodoController@edit')->name('periodo.edit')
  ->middleware('permission:users.index');

  Route::put('periodos/{periodo}', 'PeriodoController@update')->name('periodo.update')
  ->middleware('permission:users.edit');

  //acceso a usuarios

  Route::post('users/store', 'UserController@store')->name('users.store')
  ->middleware('permission:users.create');

  Route::post('users/storeD', 'UserController@storeD')->name('users.storeD')
  ->middleware('permission:users.create');

  Route::post('users/storeU', 'UserController@storeU')->name('users.storeU')
  ->middleware('permission:users.create');

  Route::get('users', 'UserController@index')->name('users.index')
  ->middleware('permission:users.index');

  Route::put('users/{user}', 'UserController@update')->name('users.update')
  ->middleware('permission:users.edit');

  Route::get('users/{user}', 'UserController@show')->name('users.show')
  ->middleware('permission:users.show');

  Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
  ->middleware('permission:users.destroy');

  Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
  ->middleware('permission:users.edit');

  //acceso a calificaciones

  Route::post('calificaciones/store', 'CalificacionesController@store')->name('calificaciones.store')
  ->middleware('permission:calificaciones.create');

  Route::get('calificaciones', 'CalificacionesController@index')->name('calificaciones.index')
  ->middleware('permission:calificaciones.index');



  Route::put('calificaciones/{calificacion}', 'CalificacionesController@update')->name('calificaciones.update')
  ->middleware('permission:calificaciones.edit');

  Route::get('calificaciones/{calificacion}', 'CalificacionesController@show')->name('calificaciones.show')
  ->middleware('permission:calificaciones.show');

  Route::delete('calificaciones/{calificacion}', 'CalificacionesController@destroy')->name('calificaciones.destroy')
  ->middleware('permission:calificaciones.destroy');

  Route::get('calificaciones/{calificacion}/edit', 'CalificacionesController@edit')->name('calificaciones.edit')
  ->middleware('permission:calificaciones.edit');

  //acceso a alumnos
  Route::get('alumnos', 'alumnosController@index')->name('alumnos.index')
  ->middleware('permission:alumnos.index');

  //Route::get('grupos/create', 'GrupoController@create')->name('grupos.create')
  //->middleware('permission:grupos.create');

  //Route::get('alumnos/{semestre}/{carrera}', 'alumnosController@pdfCarrera')->name('alumnos.pdfCarrera')
  //->middleware('permission:alumnos.pdfCarrera');

  Route::POST('alumnos/pdfCarrera', 'alumnosController@pdfCarrera')->name('alumnos.pdf');

  Route::put('alumnos/{alumnos}', 'alumnosController@update')->name('alumnos.update')
  ->middleware('permission:alumnos.edit');

  Route::get('alumnos/{alumnos}', 'alumnosController@show')->name('alumnos.show')
  ->middleware('permission:alumnos.show');

  Route::delete('alumnos/{alumnos}', 'alumnosController@destroy')->name('alumnos.destroy')
  ->middleware('permission:alumnos.destroy');

  Route::get('alumnos/{alumnos}/edit', 'alumnosController@edit')->name('alumnos.edit')
  ->middleware('permission:alumnos.edit');

  Route::get('alumnos/{user}/calificacion', 'alumnosController@showcalificacion')->name('alumnos.showcalificacion')
  ->middleware('permission:alumnos.show');

  Route::get('profile', 'ProfileController@profile')
  ->middleware('permission:alumno.profile');

  Route::get('profile', 'ProfileController@profile')
  ->middleware('permission:alumno.profile');

  Route::post('profile/updatemail', 'ProfileController@updatemail')->name('profile.updatemail')
  ->middleware('permission:alumno.profile');

  Route::get('alumnos/{alumnos}/documento', 'alumnosController@certificadoview')->name('alumnos.certificadoview');

});
