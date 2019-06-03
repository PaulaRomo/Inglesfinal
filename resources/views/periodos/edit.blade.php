@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                <div class="card-body">
                  {!! Form::model($periodo,['route'=>['periodo.update', $periodo->id], 'method'=>'PUT','id'=>'form'  ]) !!}
                    @csrf

                        <div class="form-group row">
                            <label for="periodo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del periodo: ') }}</label>

                            <div class="col-md-6">
                                <input id="periodo" type="text" class="form-control{{ $errors->has('periodo') ? ' is-invalid' : '' }}" name="periodo" value="{{ $periodo->periodo ?? old('periodo') }}" required autofocus>

                                @if ($errors->has('periodo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('periodo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inicio" class="col-md-4 col-form-label text-md-right">{{ __('Inicio del periodo') }}</label>

                            <div class="col-md-6">
                                <input id="inicio" type="date" class="form-control{{ $errors->has('inicio') ? ' is-invalid' : '' }}" name="inicio" value="{{ $periodo->inicio ?? old('inicio') }}" required>

                                @if ($errors->has('inicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fin" class="col-md-4 col-form-label text-md-right">{{ __('Fin del periodo') }}</label>

                            <div class="col-md-6">
                                <input id="fin" type="date" class="form-control{{ $errors->has('fin') ? ' is-invalid' : '' }}" name="fin" value="{{ $periodo->fin ?? old('fin') }}" required>

                                @if ($errors->has('fin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fin') }}</strong>
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

<script>
        $(document).ready(function () {
            $("form").submit(function () {
                a=$("#inicio").val()
                b=$("#fin").val()

                if (a>=b){
                    alert("La fecha de inicio debe de ser menor");
                    return false;
                
                }
    
            });
        });
</script>
@endsection