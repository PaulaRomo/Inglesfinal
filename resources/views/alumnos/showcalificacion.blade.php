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
                                <th>{{ __('Nivel')  }}  </th>
                                <th scope="col">Unidad 1 </th>
                                <th scope="col">Unidad 2</th>
                                <th scope="col">Unidad 3</th>
                                <th scope="col">Unidad 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @php

                                $ultimaRv=0
                                @endphp
                                <th>  {{$datosAlumno->calificaciones->nivelActual}}</th>

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


                            </tr>
                        </tbody>
                    </table>

                    @if ($ultimaRv!=4)


                    @else
                    @php
                    @endphp
                    Promedio: {{$datosAlumno->calificaciones->$actual}}

                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
