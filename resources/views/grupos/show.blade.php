@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4>Grupo
                    <a target="_blank" href="{{asset($grupo->instrumentacion)}} " style="position:absolute; right:40px;"
                    class="btn btn-sm btn-primary">
                      Ver instrumentacion
                    </a>
                </h4>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="10px">ID</th>
                      <th>Nombre</th>
                      <th>Docente</th>
                      <th>Días</th>
                      <th>Horario</th>
                      <th>

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->nombre_grupo }}</td>
                        <td>
                          <?php
                            $idUs=DB::table('user_doc__grups')->where('grup_id',$grupo->id)->pluck('user_id');
                            if(count($idUs)>0){
                              $idUser=DB::table('users')->where('id',$idUs[0])->pluck('name');
                              if(count($idUser)>0){
                          ?>
                                {{ $idUser[0]}}
                          <?php
                              }
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            $hay=DB::table('user_alum__grups')->where('grup_id',$grupo->id)->pluck('user_id');
                            $dias=DB::table('dias')->where('grupos_id',$grupo->id)->get();
                            $horario='';
                            $di='';
                            if(count($dias)>0){
                              if($dias[0]->lunes){
                                $horario=$dias[0]->lunes;
                                $di=$di.' '.'Lunes';
                              }
                              if($dias[0]->martes){
                                $horario=$dias[0]->martes;
                                $di=$di.' '.'Martes';
                              }
                              if($dias[0]->miercoles){
                                $horario=$dias[0]->miercoles;
                                $di=$di.' '.'Miercoles';
                              }
                              if($dias[0]->jueves){
                                $horario=$dias[0]->jueves;
                                $di=$di.' '.'Jueves';
                              }
                              if($dias[0]->viernes){
                                $horario=$dias[0]->viernes;
                                $di=$di.' '.'Viernes';
                              }
                              if($dias[0]->sabado){
                                $horario=$dias[0]->sabado;
                                $di=$di.' '.'Sabado';
                              }
                          ?>
                              {{$di}}
                          <?php
                            }
                          ?>
                        </td>
                        <td>{{ $horario }}</td>
                       {{--  <td>

                            <a href="{{ route('grupos.agregarCalificaciones', $grupo->id ) }}"
                                class="btn btn-sm btn-success">
                                  Agregar Calificaciones
                                </a>
                        </td> --}}
                      </tr>
                  </tbody>
                </table>
              </div>
          </div>
          <br>
              <div class="card">
                  <div class="card-header">
                  <h4>Alumnos</h4>
                </div>
                <div class="card-body">
                  {!! Form::model($grupo,['route'=>['grupos.guardarCalificaciones', $grupo], 'method'=>'PUT']) !!}
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Nombre </th>
                                  <th scope="col">Unidad 1 </th>
                                  <th scope="col">Unidad 2</th>
                                  <th scope="col">Unidad 3</th>
                                  <th scope="col">Unidad 4</th>
                                  <th scope="col">Promedio</th>
                              </tr>
                          </thead>
                          <tbody>

                              @foreach ($alumnosxGrupo as $alumno)
                              <tr>

                                  <th scope="row">
                                      {{$alumno->name}}

                                      <input type="hidden" name='user_id[]' value="{{$alumno->user_id}}">
                                  </th>

                                  <th>
                                      <input name='unidad1[]' class='col-xl-5' type="text"
                                          value="{{$alumno->unidad1}} " tabindex="1">
                                  </th>

                                  <th scope="row">
                                      <input name="unidad2[]" class='col-xl-5' type="text"
                                          value="{{$alumno->unidad2}} " tabindex="2">
                                  </th>

                                  <th scope="row">
                                      <input name="unidad3[]" class='col-xl-5' type="text"
                                          value="{{$alumno->unidad3}} " tabindex="3">
                                  </th>

                                  <th scope="row">
                                      <input name="unidad4[]" class='col-xl-5' type="text"
                                          value="{{$alumno->unidad4}} " tabindex="4">
                                  </th>

                                @php
                                    $nivelac='nivel'.$alumno->nivelActual;
                                @endphp
                                  <th scope="row">
                                  <input type="hidden" name="nivelActual" value="{{$nivelac}}">
                                    <label for="  ">{{$alumno->$nivelac}}</label>

                                </th>



                              </tr>

                              @endforeach

                          </tbody>

                      </table>
                      <button class="btn btn-primary">Guardar Calificaciones</button>

                  {!!Form::close()!!}

              </div>
            </div>

        </div>
    </div>
  </div>
@endsection
