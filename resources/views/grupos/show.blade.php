@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4>Grupo
                    @php
                        $Peri=DB::table('unidad__periodos')->where('grup_id',$grupo->id)->pluck('id');
                    @endphp
                    @can('grupo.create')
                      <a style="background-color:orange; border:orange; position:absolute; right:170px;" href="{{ route('grupos.periodo', $grupo->id ) }}"
                          class="btn btn-sm btn-primary">
                          Agregar/Unidades/Periodo
                      </a>
                    @endcan
                    <a target="_blank" href="{{asset($grupo->instrumentacion)}} " style="position:absolute; right:40px;"
                    class="btn btn-sm btn-primary">
                      Ver instrumentacion
                    </a>
                    <a style="position:absolute; right:330px;" href="{{ route('grupos.pdfin', $grupo->id) }}"
                    class="btn btn-sm btn-success">
                      Reporte Final
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
                @if(count($Peri)==0)
                    <b><p>Los Alumnos no se mostraran, hasta que se agregen las unidades a calificar por periodo</p></b>
                @endif
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
                                  <th scope="col">Unidad 5</th>
                                  <th scope="col">Unidad 6</th>
                                  <th scope="col">Unidad 7</th>
                                  <th scope="col">Unidad 8</th>
                                  <th scope="col">Promedio</th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                            $fecha=date("Y-m-d");
                            //dd($FechaPeri[0]->inicio);
                            @endphp
                            @if (($fecha>=$FechaPeri[3]->inicio)&&($fecha<=$FechaPeri[3]->fin))
                              <h3>Segundas</h3>
                              @foreach ($alumnosxGrupo as $alumno)
                                @php
                                  $nivelac='nivel'.$alumno->nivelActual;

                                @endphp
                                  <tr>
                                    <th scope="row">
                                      {{$alumno->name}}
                                      <input type="hidden" name='user_id[]' value="{{$alumno->user_id}}">
                                    </th>
                                    @if(($alumno->unidad1)<70)
                                      <th>
                                        <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad1}}" tabindex="1">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad1}}" tabindex="1">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad1}}" tabindex="1" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad2<70)
                                      <th>
                                        <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad2}}" tabindex="2">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad2}}" tabindex="2">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad2}}" tabindex="2" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad3<70)
                                      <th>
                                        <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad3}}" tabindex="3">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad3}}" tabindex="3">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad3}}" tabindex="3" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad4<70)
                                      <th>
                                        <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad4}}" tabindex="4">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad4}}" tabindex="4">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad4}}" tabindex="4" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad5<70)
                                      <th>
                                        <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad5}}" tabindex="5">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad5}}" tabindex="5">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad5}}" tabindex="5" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad6<70)
                                      <th>
                                        <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad6}}" tabindex="6">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad6}}" tabindex="6">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad6}}" tabindex="6" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad7<70)
                                      <th>
                                        <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad7}}" tabindex="7">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad7}}" tabindex="7">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad7}}" tabindex="7" disabled>
                                      </th>
                                    @endif
                                    @if($alumno->unidad8<70)
                                      <th>
                                        <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad8}}" tabindex="8">
                                      </th>
                                    @else
                                      <th>
                                        <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="hidden"
                                        value="{{$alumno->unidad8}}" tabindex="8">
                                        <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                        value="{{$alumno->unidad8}}" tabindex="8" disabled>
                                      </th>
                                    @endif
                                    @php
                                    $nivelac='nivel'.$alumno->nivelActual;
                                    @endphp
                                    <th scope="row">
                                      <input type="hidden" name="nivelActual" value="{{$nivelac}}">
                                      <label for="  ">{{$alumno->$nivelac}}</label>
                                    </th>
                                @endforeach
                            @else
                              @if ((count($P1)>1)||(count($P2)>1)||(count($P3)>1))
                                @foreach ($alumnosxGrupo as $alumno)
                                  <tr>
                                    <th scope="row">
                                      {{$alumno->name}}
                                      <input type="hidden" name='user_id[]' value="{{$alumno->user_id}}">
                                    </th>
                                    @if(in_array("Unidad1", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad1", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad1", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad1[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad1}}" tabindex="1">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad1}}" tabindex="1" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad2", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad2", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad2", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad2[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad2}}" tabindex="2">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad2}}" tabindex="2" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad3", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad3", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad3", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad3[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad3}}" tabindex="3">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad3}}" tabindex="3" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad4", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad4", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad4", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad4[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad4}}" tabindex="4">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad4}}" tabindex="4" disabled>
                                        </th>
                                      @endif
                                    @endif


                                    @if(in_array("Unidad5", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad5", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad5", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad5[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad5}}" tabindex="5">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad5}}" tabindex="5" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad6", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad6", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad6", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad6[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad6}}" tabindex="6">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad6}}" tabindex="6" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad7", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad7", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad7", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad7[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad7}}" tabindex="7">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad7}}" tabindex="7" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @if(in_array("Unidad8", $P1))
                                      @if(($fecha>=$FechaPeri[0]->inicio)&&($fecha<=$FechaPeri[0]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad8", $P2))
                                      @if(($fecha>=$FechaPeri[1]->inicio)&&($fecha<=$FechaPeri[1]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                          <input min="0" max="100" name='' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8" disabled>
                                        </th>
                                      @endif
                                    @elseif(in_array("Unidad8", $P3))
                                      @if(($fecha>=$FechaPeri[2]->inicio)&&($fecha<=$FechaPeri[2]->fin))
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                        </th>
                                      @else
                                        <th>
                                          <input min="0" max="100" name='unidad8[]' class='form-control form-control-sm' type="hidden"
                                          value="{{$alumno->unidad8}}" tabindex="8">
                                          <input min="0" max="100"  class='form-control form-control-sm' type="number"
                                          value="{{$alumno->unidad8}}" tabindex="8" disabled>
                                        </th>
                                      @endif
                                    @endif

                                    @php
                                    $nivelac='nivel'.$alumno->nivelActual;
                                    @endphp
                                    <th scope="row">
                                      <input type="hidden" name="nivelActual" value="{{$nivelac}}">
                                      <label for="  ">{{$alumno->$nivelac}}</label>
                                    </th>
                                  </tr>
                                @endforeach
                              @endif
                            @endif
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
