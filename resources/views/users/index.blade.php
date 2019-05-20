@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                  <h4>Usuarios</h4>
                  @can ('users.create')
                    <a style="background-color:#6AA7FC; border:#6AA7FC;" href="#popup2"
                    class="btn btn-success my-2 my-sm-0">
                      Crear
                    </a>
                  @endcan
                  <nav class="navbar navbar-light bg-light float-right">
                 <form class="form-inline" action="{{ route('users.index')}}" method='get'>
                 <input value="{{isset($busqueda)?$busqueda:'' }}" name="search" class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search">
                           <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>

                       </form>
                   </nav>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th width="10px">ID</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td width="10px">
                            @can ('users.edit')
                              <a style="background-color:orange; border:orange;" href="{{ route('users.edit', $user->id ) }}"
                              class="btn btn-sm btn-success">
                                Editar/Permisos
                              </a>
                            @endcan
                          </td>
                          <td width="10px">
                            @can ('users.destroy')
                              {!! Form::open(['route' => ['users.destroy', $user->id],
                                'method'=>'DELETE']) !!}
                                {!! Form::submit('Eliminar',['class'=>'btn btn-sm btn-danger']) !!}
                              {!! Form::close() !!}
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!--create modal-->

<div class="modal-wrapper" id="popup2">
  <div style="background: transparent;" class="popup2-contenedor">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">{{ __('Registrar') }}<a style="background:transparent; color: black; position: absolute; right:25px;" href="{{ route('users.index',$users) }}">X</a></div>                <div class="card-body">
            <script language="JavaScript">
                function habilita(){
                    $(".randol").removeAttr("disabled")
                }
                function deshabilita(){
                    $(".randol").attr("disabled","disabled")
                }
                $(document).ready(function(){
                    $('#TU').on('change',function(){
                        if (this.checked) {
                            var capa=document.getElementById("eli");
                            capa.style.display="";
                                $("#Ro").hide();
                                $("#Nac").hide();
                                $("#Pau").show();
                            } else {
                                $("#Ro").hide();
                                $("#Nac").hide();
                                $("#Pau").hide();
                            }
                    })
                    $('#TUd').on('change',function(){
                        var capa=document.getElementById("eli");
                        capa.style.display="";
                        if (this.checked) {
                                $("#Pau").hide();
                                $("#Nac").hide();
                                $("#Ro").show();
                            } else {
                                $("#Pau").hide();
                                $("#Ro").hide();
                                $("#Nac").hide();
                            }
                    })
                    $('#TUu').on('change',function(){
                        var capa=document.getElementById("eli");
                        capa.style.display="";
                        if (this.checked) {
                                $("#Pau").hide();
                                $("#Nac").show();
                                $("#Ro").hide();
                            } else {
                                $("#Pau").hide();
                                $("#Ro").hide();
                                $("#Nac").hide();
                            }
                    })
                });
            </script>
            <div class="form-group2 row" style="">
                <label for="IntExt" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario: ') }}</label>
                <div class="col-md-6">
                    <input type="radio" id="TU" name="tu"> Alumno
                    <input type="radio" id="TUd" name="tu"> Docente
                    <input type="radio" id="TUu" name="tu"> General        
                </div>
            </div>
            <div id='eli' style="display:none;">
            <div class="card-body" >
                <div id="Pau" hide>
                    <form method="POST" action="{{ route('users.store') }}" aria-label="{{ __('alumnos') }}">
                        @csrf
                        <div class="form-group2 row">
                            <label for="IntExt" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Alumno: ') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="IntExt" name="IntExt" value="Interno" onclick="habilita()" checked required autofocus> Interno
                                <br>
                                <input type="radio" id="IntExt" name="IntExt" value="Externo" onclick="deshabilita()" required autofocus> Externo
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('Número de Control: ') }}</label>

                            <div class="col-md-6">
                                <input id="numcontrol" type="text" class="form-control{{ $errors->has('numcontrol') ? ' is-invalid' : '' }}" name="numcontrol" value="{{ $alumno->numcontrol ?? old('numcontrol') }}" required autofocus>

                                @if ($errors->has('numcontrol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numcontrol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group2 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $alumno->name ?? old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Género: ') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="sexo" name="sexo" value="M" required autofocus> Masculino
                                <br>
                                <input type="radio" id="sexo" name="sexo" value="F" required autofocus> Femenino
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo: ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $alumno->email ?? old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group2 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group2 row">
                                <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera: ') }}</label>

                                <div class="col-md-6">
                                    <select id="carrera" name="carrera" class="randol form-control">
                                    <option value="null">---Seleccione---</option>
                                    <option value="ISC">Ingeniería en Sistemas Computacionales</option>
                                    <option value="IE">Ingeniería en Electromecánica</option>
                                    <option value="IGE">Ingeniería en Gestión Empresarial</option>
                                    <option value="IA">Ingeniería en Administración</option>
                                    <option value="II">Ingeniería Industrial</option>
                                    <option value="CP">Contador Público</option>
                                    </select>

                                    <input type="hidden" name="rol" value="Alumno">
                                </div>
                        </div>
                        <div class="form-group2 row">
                                <label for="semestre" class="col-md-4 col-form-label text-md-right">{{ __('Semestre: ') }}</label>

                                <div class="col-md-3">
                                <select id="semestre" name="semestre" class="randol form-control">
                                        <option value="null">---Seleccione---</option>
                                        <option value="I">I</option>
                                        <option value="II`">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        <option value="XIII">XIII</option>
                                        <option value="XIV">XIV</option>
                                        <option value="XV">XV</option>
                                </select>
                                </div>
                        </div>

                        <div class="form-group2 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="Ro" hide>
                    <form method="POST" action="{{ route('users.storeD') }}" aria-label="{{ __('Docentes') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('Número de Control: ') }}</label>

                            <div class="col-md-6">
                                <input id="numcontrol" type="text" class="form-control{{ $errors->has('numcontrol') ? ' is-invalid' : '' }}" name="numcontrol" value="{{ old('numcontrol') }}" required autofocus>

                                @if ($errors->has('numcontrol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numcontrol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo: ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id='Nac' hide>
                    <form method="POST" action="{{ route('users.storeU') }}" aria-label="{{ __('General') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo: ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña: ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
