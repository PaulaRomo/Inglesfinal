@extends('layouts.app')
@section('content')
@include('alertas.alerta')
  <div class="container">
      <div class="row">
          <div class="col-md-14">
              <div class="card">
                  <div class="card-header">
                  <h4>Grupos</h4>

                  @can ('grupos.create')
                    <a href="#popup"
                    class="btn btn-sm btn-primary">
                      Crear
                    </a>

                      <a style="background-color:#185FC2; border:#185FC2;" href="{{ route ('grupos.pdfalumno')}}"
                      class="btn btn-sm btn-primary">
                      Alumnos Inscritos
                    </a>
                  @endcan
              </div>


                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Periodo</th>
                        <th>Nivel</th>
                        <th>Docente</th>
                        <th>Días</th>
                        <th>Horario</th>
                        @can ('grupos.create')
                        <th>Vacantes</th>
                        @endcan
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @can ('grupos.create')
                        @foreach ($grupos as $grupo)
                          <tr>
                            <td>{{ $grupo->nombre_grupo }}</td>
                            <td>{{ $grupo->periodo }}</td>
                            <td>{{ $grupo->nivel }}</td>
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
                            <td>{{ $grupo->capacidad-count($hay)}}</td>
                            <td width="10px">
                              @can ('grupos.edit')
                                <a style="background-color:#185FC2; border:#185FC2;" href="{{ route('grupos.documento', $grupo->id ) }}"
                                class="btn btn-sm btn-primary">
                                  Instrumentación
                                </a>
                              @endcan
                            </td>
                            <td width="10px">
                              @can ('grupos.edit')
                                <a style="background-color:orange; border:orange;" href="{{ route('grupos.dias', $grupo->id ) }}"
                                class="btn btn-sm btn-primary">
                                  Horario/Docente/Alumno
                                </a>
                              @endcan
                            </td>
                            <td width="10px">
                              @can ('grupos.show')
                                <a href="{{ route('grupos.show', $grupo->id ) }}"
                                class="btn btn-sm btn-success">
                                  Ver
                                </a>
                              @endcan
                            </td>
                            <td width="10px">
                              @can ('grupos.edit')
                                <a style="background-color:purple; border:purple;" href="{{ route('grupos.edit', $grupo->id ) }}"
                                class="btn btn-sm btn-primary">
                                  Editar
                                </a>
                              @endcan
                            </td>

                            <td width="10px">
                              @can ('grupos.show')
                                <a href="{{ route('grupos.pdf', $grupo->id) }}"
                                class="btn btn-sm btn-primary">
                                  Rep.Unidades
                                </a>
                              @endcan
                            </td>
                            <td width="10px">
                              @can ('grupos.destroy')
                                {!! Form::open(['route' => ['grupos.destroy', $grupo->id],
                                  'method'=>'DELETE']) !!}
                                  {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                              @endcan
                            </td>
                          </tr>
                        @endforeach
                      @endcan
                      @can('grupos.index')
                            <?php
                              $idUser=Auth::User()->id;
                              $idGrup=DB::table('user_doc__grups')->where('user_id',$idUser)->pluck('grup_id');
                              $i=0;
                              $k=-1;
                              $men=0;
                              for($j=0;$j<50;$j++){
                                  $k=$k+1;
                                  if($k<count($idGrup)-1){
                                    if($idGrup[$k]>$idGrup[$k+1]){
                                      $men=$idGrup[$k+1];
                                      $idGrup[$k+1]=$idGrup[$k];
                                      $idGrup[$k]=$men;
                                    }
                                  }else {
                                    $k=-1;
                                  }

                              }
                              //dd($grupos);
                            ?>
                            @if(count($idGrup)>0)
                              @foreach ($grupos as $grupo)
                                @if($grupo->id==$idGrup[$i])
                                  <?php
                                    if(count($idGrup)-1>$i){
                                      $i++;
                                    }
                                  ?>
                                  <tr>
                                    <td>{{ $grupo->nombre_grupo }}</td>
                                    <td>{{ $grupo->periodo }}</td>
                                    <td>{{ $grupo->nivel }}</td>
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
                                    <td width="10px">
                                      @can ('grupos.index')
                                        <a style="background-color:#185FC2; border:#185FC2;" href="{{ route('grupos.documento', $grupo->id ) }}"
                                        class="btn btn-sm btn-primary">
                                          Instrumentación
                                        </a>
                                      @endcan
                                    </td>
                                    <td width="10px">
                                      @can ('grupos.edit')
                                        <a style="background-color:orange; border:orange;" href="{{ route('grupos.dias', $grupo->id ) }}"
                                        class="btn btn-sm btn-primary">
                                          Horario/Docente/Alumno
                                        </a>
                                      @endcan
                                    </td>
                                    <td width="10px">
                                      @can ('grupos.show')
                                        <a href="{{ route('grupos.show', $grupo->id ) }}"
                                        class="btn btn-sm btn-success">
                                          Ver
                                        </a>
                                      @endcan
                                    </td>
                                    <td width="10px">
                                      @can ('grupos.edit')
                                        <a style="background-color:purple; border:purple;" href="{{ route('grupos.edit', $grupo->id ) }}"
                                        class="btn btn-sm btn-primary">
                                          Editar
                                        </a>
                                      @endcan
                                    </td>

                                    <td width="10px">
                                      @can ('grupos.show')
                                        <a href="{{ route('grupos.pdf', $grupo->id) }}"
                                        class="btn btn-sm btn-primary">
                                          ReporteCalificaciones
                                        </a>
                                      @endcan
                                    </td>
                                    <td width="10px">
                                      @can ('grupos.destroy')
                                        {!! Form::open(['route' => ['grupos.destroy', $grupo->id],
                                          'method'=>'DELETE']) !!}
                                          {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                      @endcan
                                    </td>
                                  </tr>
                                @endif
                              @endforeach
                            @endif
                      @endcan
                    </tbody>
                  </table>
                  @can ('grupos.create')
                    {{ $grupos->render() }}
                  @endcan
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper" id="popup">
    <div style="background: transparent;" class="popup-contenedor">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">{{ __('Crear Grupo') }}<a style="background:transparent; color: black; position: absolute; right:25px;" href="{{ route('grupos.index') }}">X</a></div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('grupos.store') }}" aria-label="{{ __('grupos') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="nombre_grupo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Grupo: ') }}</label>

                              <div class="col-md-3">
                                  <input id="nombre_grupo" type="text" class="form-control{{ $errors->has('nombre_grupo') ? ' is-invalid' : '' }}" name="nombre_grupo" value="{{ old('nombre_grupo') }}" required autofocus>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="periodo" class="col-md-4 col-form-label text-md-right">{{ __('Periodo: ') }}</label>

                              <div class="col-md-3">
                                  <select id="periodo" name="periodo" class="form-control" required autofocus>
                                    <option value="">---Seleccionar---</option>
                                    <option value="Febrero - Julio">Febrero-Julio</option>
                                    <option value="verano">Verano</option>
                                    <option value="Agosto - Diciembre">Agosto-Diciembre</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel: ') }}</label>

                              <div class="col-md-3">
                                  <select id="nivel" name="nivel" class="form-control" required autofocus>
                                    <option value="">---Seleccionar---</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VII">VIII</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="capacidad" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad máxima: ') }}</label>

                              <div class="col-md-2">
                                  <input min="1" max="50"  id="capacidad" type="number" class="form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }}" name="capacidad" value="{{ old('capacidad') }}" required autofocus>

                                  @if ($errors->has('capacidad'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('capacidad') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Guardar') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
