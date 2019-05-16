@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4>Información Personal:</h4>
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
                      <th>Correo</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $datos->numcontrol }}</td>
                        <td>{{ $datos->sexo }}</td>
                        <td>{{ $datos->carrera.' '.$datos->semestre }}</td>
                        <td></td>
                        <td>{{ $user->email }}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
          </div>

          </div>
      </div>
  </div>
@endsection
