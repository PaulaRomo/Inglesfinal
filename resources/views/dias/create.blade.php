@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Agregar a Grupo') }}</div>
                <div class="card-body">
                    <script language="JavaScript">
                        $(document).ready(function () {
                            $('#TU').on('change', function () {
                                if (this.checked) {
                                    var capa = document.getElementById("eli");
                                    capa.style.display = "";
                                    $("#horarios").hide();
                                    $("#docent").hide();
                                    $("#alum").show();
                                } else {
                                    $("#horarios").hide();
                                    $("#docent").hide();
                                    $("#alum").hide();
                                }
                            })
                            $('#TUd').on('change', function () {
                                var capa = document.getElementById("eli");
                                capa.style.display = "";
                                if (this.checked) {
                                    $("#horarios").hide();
                                    $("#alum").hide();
                                    $("#docent").show();
                                } else {
                                    $("#horarios").hide();
                                    $("#docent").hide();
                                    $("#alum").hide();
                                }
                            })
                            $('#TUh').on('change', function () {
                                var capa = document.getElementById("eli");
                                capa.style.display = "";
                                if (this.checked) {
                                    $("#docent").hide();
                                    $("#alum").hide();
                                    $("#horarios").show();
                                } else {
                                    $("#horarios").hide();
                                    $("#docent").hide();
                                    $("#alum").hide();
                                }
                            })
                        });
                    </script>
                    <div class="form-group row">
                        <label for="IntExt" class="col-md-4 col-form-label text-md-right">{{ __('Agregar') }}</label>
                        <div class="col-md-6">
                            <input type="radio" id="TU" name="tu"> Alumno
                            <input type="radio" id="TUd" name="tu"> Docente
                            <input type="radio" id="TUh" name="tu"> Horario
                        </div>
                    </div>
                    <div id='eli' style="display:none;">
                        <div id='horarios' hide>
                            {!! Form::model($grupo,['route'=>['grupos.agreDias', $grupo->id], 'method'=>'PUT']) !!}
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Días: </th>
                                                    <th> </th>
                                                    <th width="10px"> <input type="checkbox" class="form-check-input"
                                                            value="Lunes" id="exampleCheck1" name="dias[]">Lunes<br>
                                                    </th>
                                                    <th><input type="checkbox" class="form-check-input" value="Martes"
                                                            id="exampleCheck1" name="dias[]">Martes<br></th>
                                                    <th><input type="checkbox" class="form-check-input"
                                                            value="Miercoles" id="exampleCheck1"
                                                            name="dias[]">Miércoles<br></th>
                                                    <th><input type="checkbox" class="form-check-input" value="Jueves"
                                                            id="exampleCheck1" name="dias[]">Jueves<br></th>
                                                    <th><input type="checkbox" class="form-check-input" value="Viernes"
                                                            id="exampleCheck1" name="dias[]">Viernes<br></th>
                                                    <th><input type="checkbox" class="form-check-input" value="Sabado"
                                                            id="exampleCheck1" name="dias[]">Sabado<br></th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="horario"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Inicio: ') }}</label>

                                <input type="time" name="horainicio" id="horario1" required autofocus>

                                <label for="horario"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Termina: ') }}</label>
                                <input type="time" name="horafin" id="horario2" required autofocus>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="hora" type="submit" class="btn btn-primary">
                                        {{ __('Añadir') }}
                                    </button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                        <div id='alum' hide>
                            {!! Form::model($grupo,['route'=>['grupos.agreAlum', $grupo->id],
                            'method'=>'PUT','id'=>'formalumno']) !!}
                            <div class="form-group row">
                                <label for="numcontrol"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero de Control:') }}</label>

                                <div class="col-md-6">
                                    <input id="numcontrol" type="text"
                                        class="form-control{{ $errors->has('numcontrol') ? ' is-invalid' : '' }}"
                                        name="numcontrol" value="{{ old('numcontrol') }}" required autofocus>

                                    @if ($errors->has('numcontrol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numcontrol') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="buscaralumno" type="submit" class="btn btn-primary">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                            </div>
                            {!!Form::close()!!}


                            <div id='infoalumno'>
                            </div>
                        </div>
                        <div id='docent' hide>
                            {!! Form::model($grupo,['route'=>['grupos.agreDoc', $grupo->id], 'method'=>'PUT']) !!}
                            {!! Form::label('Docente','Docente') !!}
                            {!! Form::select('docente', $docentes,null,['placeholder'=>'--Seleccionar
                            Docente--','id'=>'docentes','required autofocus']) !!}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="docente" type="submit" class="btn btn-primary">
                                        {{ __('Agregar') }}
                                    </button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $("#buscaralumno").click(function (event) {

            console.log("hola");
            form = document.getElementById("formalumno")
            var midata = new FormData(form);
            var ajax = new XMLHttpRequest();
            var numcontrol = $("#numcontrol").val();
            if (numcontrol == '') {
                return 0;
            }
            var ruta = '{{ route("grupos.balum",":id" ) }}'
            ruta = ruta.replace(':id', numcontrol);
            ajax.open('get', ruta, false /*  async false */ );
            ajax.send(midata);
            datosusuario = JSON.parse(ajax.response);
            console.log('-----------');

            if (confirm('Nombre del usuario: ' + datosusuario[0]['name'] + '\n     desea continuar?')) {

            } else {
                event.preventDefault();
            }

            $("#infoalumno").html(datosusuario);
            console.log('-----------');


        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#docente").submit(function () {
            if ($('input:checkbox').filter(':checked').length < 1) {
                $('#TUh')

                if ($('#TUh').is(':checked')) {
                    alert("Elija al menos 1 día");
                    return false;

                }
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#hora").submit(function () {
            a=$("#horario1").val()
            b=$("#horario2").val()
            if (a>=b){
                alert("La hora de inicio debe de ser menor");
                return false;

            }

        });
    });
</script>


@endsection
