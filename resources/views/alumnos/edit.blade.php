@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Editar') }}</div>
                  <div class="card-body">

                          {!! Form::model($alumno,['route'=>['alumnos.update', $alumno->id], 'method'=>'PUT']) !!}
                          @csrf


                          <input type="hidden" name="user_id" value="{{$alumno->user_id}}" >
                          <input type="hidden" name="idU" value="{{$alumno->id}}" >

                          <div class="form-group row">
                              <label for="numcontrol" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Control: ') }}</label>

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
                              <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo: ') }} </label>
                              <div class="col-md-6">
                                <label >{{ Form::radio('sexo', 'M') }} Masculino</label>
                                <br>
                                <label >{{ Form::radio('sexo', 'F') }} Femenino</label>
                              </div>
                          </div>


                          <div class="form-group row">
                                  <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera: ') }}</label>

                                  <div class="col-md-6">
                                      <select id="carrera" name="carrera" class="randol form-control">
                                      <option value="{{ $alumno->carrera}}">{{ $alumno->carrera}}</option>
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
                                  <label for="semestre" class="col-md-4 col-form-label text-md-right">{{ __('Semestre: ') }}</label>

                                  <div class="col-md-3">
                                  <select id="semestre" name="semestre" class="randol form-control">
                                          <option value="{{ $alumno->semestre}}">{{ $alumno->semestre}}</option>
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
