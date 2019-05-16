@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                  <h4>Alumnos</h4>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th width="10px">ID</th>
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
                          <td>{{ $user->user_id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->numcontrol }}</td>
                          <td>{{ $user->sexo }}</td>
                          <td>{{ $user->carrera.' '.$user->semestre }}</td>

                          <td>{{ $user->activo }}</td>

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
                              <a href="{{ route('calificaciones.create', $user->user_id  ) }}"
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
