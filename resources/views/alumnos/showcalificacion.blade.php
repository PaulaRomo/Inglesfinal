@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                @php
                $actual='nivel'.$datosAlumno->calificaciones->nivelActual;

                @endphp
                <div class="card-header">
                    Alumno:
                    {{$datosAlumno->name  }}
                </div>

                <div class="card-body">
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
                    @php
                    @endphp
                    Promedio: {{$datosAlumno->calificaciones->$actual}}

                    @endif




                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">Calificaciones de los semestres</div>
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
            </div>
        </div>
</div>
@endsection
