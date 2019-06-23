@extends('layouts.app')

@section('content')
  @include('alertas.alerta')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                <div class="card-body">
                  {!! Form::model($user,['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
                    @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" onkeyup="mayus(this);" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <script>
                            function mayus(e) {
                                e.value = e.value.toUpperCase();
                            }
                            </script>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email ?? old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br>
                        <h3>Lista de roles</h3>
                        <div class="form-group">
                          <ul class="list-unstyled">
                            @foreach ($roles as $role)
                              <li>
                                <label>
                                  {{ Form::checkbox('roles[]', $role->id, null) }}
                                  {{ $role->name }}
                                  <em>({{ $role->description ?: 'Sin descripcion' }})</em>
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
