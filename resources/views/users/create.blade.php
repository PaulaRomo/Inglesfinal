@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
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
                                            $("#Pau").show();
                                        } else {
                                            $("#Ro").hide();
                                            $("#Pau").hide();
                                        }
                                })
                                $('#TUd').on('change',function(){
                                    var capa=document.getElementById("eli");
                                    capa.style.display="";
                                    if (this.checked) {
                                            $("#Pau").hide();
                                            $("#Ro").show();
                                        } else {
                                            $("#Pau").hide();
                                            $("#Ro").hide();
                                        }
                                })
                            });
                        </script>
                        <div class="form-group row">
                            <label for="IntExt" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="TU" name="tu"> Alumno
                                <br>
                                <input type="radio" id="TUd" name="tu"> Docente
                            </div>
                        </div>
                        <div id='eli' style="display:none;">
                        <div class="card-body" >
                            <div id="Pau" hide>
                                <form method="POST" action="{{ route('users.store') }}" aria-label="{{ __('alumnos') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="IntExt" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Alumno') }}</label>
                                        <div class="col-md-6">
                                            <input type="radio" id="IntExt" name="IntExt" value="Interno" onclick="habilita()" checked required autofocus> Interno
                                            <br>
                                            <input type="radio" id="IntExt" name="IntExt" value="Externo" onclick="deshabilita()" required autofocus> Externo
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Control') }}</label>

                                        <div class="col-md-6">
                                            <input id="numcontrol" type="text" class="form-control{{ $errors->has('numcontrol') ? ' is-invalid' : '' }}" name="numcontrol" value="{{ $alumno->numcontrol ?? old('numcontrol') }}" required autofocus>

                                            @if ($errors->has('numcontrol'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('numcontrol') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $alumno->name ?? old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                                        <div class="col-md-6">
                                            <input type="radio" id="sexo" name="sexo" value="M" required autofocus> Masculino
                                            <br>
                                            <input type="radio" id="sexo" name="sexo" value="F" required autofocus> Femenino
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $alumno->email ?? old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>

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
                                    <div class="form-group row">
                                            <label for="semestre" class="col-md-4 col-form-label text-md-right">{{ __('Semestre') }}</label>

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

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="Ro" hide>
                                <form method="POST" action="{{ route('users.storeD') }}" aria-label="{{ __('Docentes') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Control') }}</label>

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
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" name="rol" value="Docente">
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
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
