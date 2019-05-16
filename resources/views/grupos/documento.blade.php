@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Subir Instrumentación') }}</div>

                <div class="card-body">

                      {!! Form::model($grupo,['route'=>['grupos.intrumentacion', $grupo->id], 'method'=>'PUT', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                        @csrf

                         <div class="form-group">
                             <input type="file" class="form-control" name="file" >
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
