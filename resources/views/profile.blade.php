@extends('layouts.app')

@section('content')

@php
    $actual='nivel'.$datosAlumno->calificaciones->nivelActual;

@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header">Perfil: {{ $user->name }}
                    <a target="_blank" href="certificados/{{$datosAlumno->path_certificado}} " style="position:absolute; right:40px;"
                        class="btn btn-sm btn-primary">
                          Ver certificado
                        </a>
                </div>
                <div class="card-body">Calificaciones por unidad
                    <div>
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>{{ __('Nivel')  }} </th>
                                    <th scope="col">Unidad 1 </th>
                                    <th scope="col">Unidad 2</th>
                                    <th scope="col">Unidad 3</th>
                                    <th scope="col">Unidad 4</th>
                                    <th scope="col">Unidad 5</th>
                                    <th scope="col">Unidad 6</th>
                                    <th scope="col">Unidad 7</th>
                                    <th scope="col">Unidad 8</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php

                                    $ultimaRv=0
                                    @endphp
                                    <th> {{$datosAlumno->calificaciones->nivelActual}}</th>

                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad1!=null)
                                        {{$datosAlumno->calificaciones->unidad1}}
                                        @php
                                        $ultimaRv=1
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad2!=null)
                                        {{$datosAlumno->calificaciones->unidad2}}
                                        @php
                                        $ultimaRv=2
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad3!=null)
                                        {{$datosAlumno->calificaciones->unidad3}}
                                        @php
                                        $ultimaRv=3
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad4!=null)
                                        {{$datosAlumno->calificaciones->unidad4}}
                                        @php
                                        $ultimaRv=4
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad5!=null)
                                        {{$datosAlumno->calificaciones->unidad5}}
                                        @php
                                        $ultimaRv=5
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad6!=null)
                                        {{$datosAlumno->calificaciones->unidad6}}
                                        @php
                                        $ultimaRv=6
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad7!=null)
                                        {{$datosAlumno->calificaciones->unidad7}}
                                        @php
                                        $ultimaRv=7
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad8!=null)
                                        {{$datosAlumno->calificaciones->unidad8}}
                                        @php
                                        $ultimaRv=8
                                        @endphp
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>

                                </tr>
                            </tbody>
                        </table>

                        @if ($ultimaRv!=8)


                        @else

                        Promedio: {{$datosAlumno->calificaciones->$actual}}

                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header">Calificaciones por nivel</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nivel 1 </th>
                            <th scope="col">Nivel 2</th>
                            <th scope="col">Nivel 3</th>
                            <th scope="col">Nivel 4</th>
                            <th scope="col">Nivel 5</th>
                            <th scope="col">Nivel 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php

                            $ultimaRv=0
                            @endphp

                            <th scope="row">@if ($datosAlumno->calificaciones->nivel1!=null)
                                {{$datosAlumno->calificaciones->nivel1}}
                                @php
                                $ultimaRv=1
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>
                            <th scope="row">@if ($datosAlumno->calificaciones->nivel2!=null)
                                {{$datosAlumno->calificaciones->nivel2}}
                                @php
                                $ultimaRv=2
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>
                            <th scope="row">@if ($datosAlumno->calificaciones->nivel3!=null)
                                {{$datosAlumno->calificaciones->nivel3}}
                                @php
                                $ultimaRv=3
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>
                            <th scope="row">@if ($datosAlumno->calificaciones->nivel4!=null)
                                {{$datosAlumno->calificaciones->nivel4}}
                                @php
                                $ultimaRv=4
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>
                            <th scope="row">@if ($datosAlumno->calificaciones->nivel5!=null)
                                {{$datosAlumno->calificaciones->nivel5}}
                                @php
                                $ultimaRv=5
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>
                            <th scope="row">@if ($datosAlumno->calificaciones->nivel6!=null)
                                {{$datosAlumno->calificaciones->nivel6}}
                                @php
                                $ultimaRv=6
                                @endphp
                                @else
                                Sin Calificar

                                @endif
                            </th>

                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="row justify-content-center">
              <div class="col-md-10 col-md-offset-1">
                <div class="card">
                  <div class="card-header">Correo del alumno</div>

                  <form enctype="multipart/form-data" action="{{ route('profile.updatemail') }}" method="POST">
                    <label class="col-md-4 col-form-label text-md-right">Actualizar correo</label>


                      <br>
                      <div class="form-group row">
                          <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('E-mail: ') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $datosAlumno->email}}">
                          </div>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" name="upload" value="Actualizar" class="pull-right btn btn-sm btn-primary">
                      </div>


                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>

</div>
@endsection
