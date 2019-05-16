@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">
              <h4>{{ $role->name }}</h4>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>Descripción: {{ $role->description }}</td>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><h3>Permiso especial</h3>
                      <div class="form-group">

                        <label >{{ Form::radio('special', 'all-access') }} Acceso total</label>
                        <label >{{ Form::radio('special', 'no-access') }} Ningun acceso</label>
                      </div>

                      <br>
                      <h3>Lista de permisos</h3>
                      <div class="form-group">
                        <ul class="list-unstyled">
                          @foreach ($permissions as $permission)
                            <li>
                              <label>
                                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                                {{ $permission->name }}
                                <em>({{ $permission->description ?: 'Sin descripcion' }})</em>
                              </label>
                            </li>
                          @endforeach
                        </ul>
                      </div></td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
