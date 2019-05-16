@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create group') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('grupos.store') }}" aria-label="{{ __('grupos') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre_grupo" class="col-md-4 col-form-label text-md-right">{{ __('Group name') }}</label>

                            <div class="col-md-3">
                                <input id="nombre_grupo" type="text" class="form-control{{ $errors->has('nombre_grupo') ? ' is-invalid' : '' }}" name="nombre_grupo" value="{{ old('nombre_grupo') }}" required autofocus>

                                @if ($errors->has('nombre_grupo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_grupo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodo" class="col-md-4 col-form-label text-md-right">{{ __('Period') }}</label>

                            <div class="col-md-3">
                                <select id="periodo" name="periodo" class="form-control">
                                  <option value="null">---Select---</option>
                                  <option value="Enero - Agosto">January-August</option>
                                  <option value="Agosto - Diciembre">August-December</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                            <div class="col-md-3">
                                <select id="nivel" name="nivel" class="form-control">
                                  <option value="null">---Select---</option>
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
                            <label for="dias" class="col-md-4 col-form-label text-md-right">{{ __('Days') }}</label>

                            <div class="col-md-4">
                                <select id="dias" name="dias" class="form-control">
                                  <option value="null">---Select---</option>
                                  <option value="Martes - Jueves">Tuesday-Thursday</option>
                                  <option value="Lunes - Martes-Miercoles-Jueves">Monday-Tuesday-Thursday</option>
                                  <option value="Viernes">Friday</option>
                                  <option value="Sabado">Saturday</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">{{ __('Schedule') }}</label>

                            <div class="col-md-3">
                                <select id="horario" name="horario" class="form-control">
                                  <option value="null">---Select---</option>
                                  <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
                                  <option value="3:00 PM - 5:00 PM">3:00 PM - 5:00 PM</option>
                                  <option value="3:00 PM - 8:00 PM">3:00 PM - 8:00 PM</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacidad" class="col-md-4 col-form-label text-md-right">{{ __('Group capacity') }}</label>

                            <div class="col-md-2">
                                <input id="capacidad" type="number" class="form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }}" name="capacidad" value="{{ old('capacidad') }}" required autofocus>

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
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
