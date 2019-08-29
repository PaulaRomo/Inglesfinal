@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- {{json_encode($datosAlumno) }} --}}

                <div class="card-header">{{ __('Nivel X ') }}

                    {{ $datosAlumno->ap.' .'.$datosAlumno->am.' '.$datosAlumno->name }}  
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('calificaciones.store') }}" aria-label="{{ __('grupos') }}">
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Unidad 1 </th>
                                    <th scope="col">Unidad 2</th>
                                    <th scope="col">Unidad 3</th>
                                    <th scope="col">Unidad 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{$ultimaRv=0}}


                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad1!=null)
                                        {{$datosAlumno->calificaciones->unidad1}}
                                        {{$ultimaRv=1}}
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad2!=null)
                                        {{$datosAlumno->calificaciones->unidad1}}
                                        {{$ultimaRv=2}}
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad3!=null)
                                        {{$datosAlumno->calificaciones->unidad1}}
                                        {{$ultimaRv=3}}
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>
                                    <th scope="row">@if ($datosAlumno->calificaciones->unidad4!=null)
                                        {{$datosAlumno->calificaciones->unidad1}}
                                        {{$ultimaRv=4}}
                                        @else
                                        Sin Calificar

                                        @endif
                                    </th>

                                
                                </tr>
                            </tbody>
                        </table>

                        @if ($ultimaRv!=4)

                        <div>
                            <div class="form-group row">
                                <label for="nombre_grupo" {{$ultimaRv}}
                                    class="col-md-4 col-form-label text-md-right">{{ __('Calificacion de unidad ').($ultimaRv+1) }}
                                </label>

                                <div class="col-md-3">
                                    <input id="nombre_grupo" name='{{__('unidad').($ultimaRv+1) }}         ' type="text"
                                        class="form-control{{ $errors->has('nombre_grupo') ? ' is-invalid' : '' }}"
                                        name="nombre_grupo" value="" required autofocus>

                                    @if ($errors->has('nombre_grupo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_grupo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </div>

                        @endif



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
