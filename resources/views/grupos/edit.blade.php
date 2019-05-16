@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Grupo') }}</div>

                <div class="card-body">

                      {!! Form::model($grupo,['route'=>['grupos.update', $grupo->id], 'method'=>'PUT', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="nombre_grupo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del grupo: ') }}</label>

                            <div class="col-md-3">
                                <input id="nombre_grupo" type="text" class="form-control{{ $errors->has('nombre_grupo') ? ' is-invalid' : '' }}" name="nombre_grupo" value="{{ $grupo->nombre_grupo ?? old('nombre_grupo') }}" required autofocus>

                                @if ($errors->has('nombre_grupo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_grupo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodo" class="col-md-4 col-form-label text-md-right">{{ __('Período: ') }}</label>

                            <div class="col-md-3">
                                <select id="periodo" name="periodo" class="form-control">
                                  <option value="{{ $grupo->periodo}}">{{ $grupo->periodo}}</option>
                                  <option value="Febrero - Julio">Febrero - Julio</option>
                                  <option value="verano">Verano</option>
                                  <option value="Agosto - Diciembre">Agosto - Diciembre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel: ') }}</label>

                            <div class="col-md-3">
                                <select id="nivel" name="nivel" class="form-control">
                                  <option value="{{ $grupo->nivel}}">{{ $grupo->nivel}}</option>
                                  <option value="I">I</option>
                                  <option value="II">II</option>
                                  <option value="III">III</option>
                                  <option value="IV">IV</option>
                                  <option value="V">V</option>
                                  <option value="VI">VI</option>
                                  <option value="VII">VII</option>
                                  <option value="VII">VIII</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="capacidad" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad: ') }}</label>

                            <div class="col-md-2">
                                <input id="capacidad" type="number" class="form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }}" name="capacidad" value="{{ $grupo->capacidad ?? old('capacidad') }}" required autofocus>

                                @if ($errors->has('capacidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('capacidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
