@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                  
                  {!! Form::model($role,['route'=>['roles.update', $role->id], 'method'=>'PUT']) !!}
                    @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $role->name ?? old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" permission="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('URL Amigable: ') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $role->slug ?? old('slug') }}" required autofocus>

                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback" permission="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción: ') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $role->description ?? old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" permission="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h3>Permiso especial</h3>
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
