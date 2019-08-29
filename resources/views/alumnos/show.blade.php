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
                      <th>Nombre</th>
                      <th>Numero de control</th>
                      <th>Sexo</th>
                      <th>Carrera </th>

                      <th>Correo</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>{{ $user->ap.' '.$user->am.' '.$user->name }}</td>
                        <td>{{ $datos->numcontrol }}</td>
                        <td>{{ $datos->sexo }}</td>
                        <td>{{ $datos->carrera.' '.$datos->semestre }}</td>

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
