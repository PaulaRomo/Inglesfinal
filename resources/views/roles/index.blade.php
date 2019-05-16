@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    <h4>Roles
                  @can ('roles.create')
                    <a href="{{ route('roles.create') }}"
                    class="bth btn-sm btn-primary pull-right">
                      Crear
                    </a>

                  @endcan
                  </h4>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th width="10px">ID</th>
                        <th>Rol</th>
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                        <tr>
                          <td>{{ $role->id }}</td>
                          <td>{{ $role->name }}</td>

                          <td width="10px">
                            @can ('roles.edit')
                              <a href="{{ route('roles.edit', $role->id ) }}"
                              class="btn btn-sm btn-primary">
                                Ver/Editar
                              </a>
                            @endcan
                          </td>
                          <td width="10px">
                            @can ('roles.destroy')
                              {!! Form::open(['route' => ['roles.destroy', $role->id],
                                'method'=>'DELETE']) !!}
                                {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                              {!! Form::close() !!}
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
