@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">

                    <div class="">
                      <h4 style="position:absolute; top:15px;" >Alumnos</h4>
                      <br>  <br>
                        <div class="col-md-3">

                          {!! Form::open(['route' => 'alumnos.pdf', 'method' => 'POST']) !!}
                            <select style="position:absolute; top:0px; left:100px;" id="carrera" name="carrera" class="randol form-control">
                            <option value="null">---Carrera---</option>
                            <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                            <option value="Ingeniería en Electromecánica">Ingeniería en Electromecánica</option>
                            <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                            <option value="Ingeniería en Administración">Ingeniería en Administración</option>
                            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                            <option value="Contador Público">Contador Público</option>
                            </select>

                            <select style="position:absolute; top:0px; left:400px;"  id="semestre" name="semestre" class="randol form-control">
                                    <option value="null">---Semestre---</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XIII">XIII</option>
                                    <option value="XIV">XIV</option>
                                    <option value="XV">XV</option>
                            </select>
                            <button style="position:absolute; top:0px; left:680px;"  type="submit" class="btn btn-primary">
                                {{ __('PDF') }}
                            </button>
                            </form>
                        </div>
                    </div>

                  <nav class="navbar navbar-light bg-light float-right">
                 <form class="form-inline" action="{{ route('alumnos.index')}}" method='get'>

                 <input value="{{isset($busqueda)?$busqueda:'' }}" name="search" class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search">
                           <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>

                       </form>
                   </nav>

                </div>

                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Sexo</th>
                        <th>Carrera </th>
                        <th>Estado</th>

                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>

{{--
                    'IntExt', 'numcontrol','sexo','avtivo','carrera','semestre','user_id'
   --}}

                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->numcontrol }}</td>
                          <td>{{ $user->sexo }}</td>
                          <td>{{ $user->carrera.' '.$user->semestre }}</td>
                          @if ($user->activo==1)
                            <td>Activo</td>
                          @else
                            <td>Inactivo</td>
                          @endif


                          <td width="10px">
                            @can ('users.show')
                              <a style="background-color:purple; border:purple;" href="{{ route('users.show', $user->user_id ) }}"
                              class="btn btn-sm btn-success">
                                Ver
                              </a>
                            @endcan
                          </td>

                          <td width="10px">
                            @can ('users.show')
                              <a href="{{ route('alumnos.showcalificacion', $user->user_id  ) }}"
                              class="btn btn-sm btn-success">
                                Calificaciones
                              </a>
                            @endcan
                          </td>


                          <td width="10px">
                            @can ('users.edit')
                              <a href="{{ route('alumnos.edit', $user->user_id ) }}"
                              class="btn btn-sm btn-primary">
                                Editar
                              </a>
                            @endcan
                          </td>

                          <td width="10px">
                            @can ('users.destroy')
                              {!! Form::open(['route' => ['users.destroy', $user->user_id],
                                'method'=>'DELETE']) !!}
                                {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                              {!! Form::close() !!}
                            @endcan
                          </td>

                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
