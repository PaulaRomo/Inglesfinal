@extends('layouts.app')

@section('content')
<style>
    .container2 {
    width: 80%;
    margin: 1em auto;
    padding: 1em 5%;
    background: #fff;
    font-family: sans-serif;
    font-size: 16px;
    line-height: 1.5;
    }

    h1, h2 {
    margin-bottom: .5em;
    }

    h1 {
    font-size: 2em;
    }

    h2 {
    font-size: 1.6em;
    }

    p {
    margin-bottom: 1em;
    }
</style>
<script>
    $(document).ready(function(){
        //periodo 1
        $('#P11').on('change',function(){
            if (this.checked) {
                    $("#P212").hide();
                    $("#P313").hide();
                } else {
                    $("#P212").show();
                    $("#P313").show();
                }
        })
        $('#P12').on('change',function(){
            if (this.checked) {
                    $("#P222").hide();
                    $("#P323").hide();
                } else {
                    $("#P222").show();
                    $("#P323").show();
                }
        })
        $('#P13').on('change',function(){
            if (this.checked) {
                    $("#P232").hide();
                    $("#P333").hide();
                } else {
                    $("#P232").show();
                    $("#P333").show();
                }
        })
        $('#P14').on('change',function(){
            if (this.checked) {
                    $("#P242").hide();
                    $("#P343").hide();
                } else {
                    $("#P242").show();
                    $("#P343").show();
                }
        })
        $('#P15').on('change',function(){
            if (this.checked) {
                    $("#P252").hide();
                    $("#P353").hide();
                } else {
                    $("#P252").show();
                    $("#P353").show();
                }
        })
        $('#P16').on('change',function(){
            if (this.checked) {
                    $("#P262").hide();
                    $("#P363").hide();
                } else {
                    $("#P262").show();
                    $("#P363").show();
                }
        })
        $('#P17').on('change',function(){
            if (this.checked) {
                    $("#P272").hide();
                    $("#P373").hide();
                } else {
                    $("#P272").show();
                    $("#P373").show();
                }
        })
        $('#P18').on('change',function(){
            if (this.checked) {
                    $("#P282").hide();
                    $("#P383").hide();
                } else {
                    $("#P282").show();
                    $("#P383").show();
                }
        })
        //periodo 2
        $('#P21').on('change',function(){
            if (this.checked) {
                    $("#P313").hide();
                } else {
                    $("#P313").show();
                }
        })
        $('#P22').on('change',function(){
            if (this.checked) {
                    $("#P323").hide();
                } else {
                    $("#P323").show();
                }
        })
        $('#P23').on('change',function(){
            if (this.checked) {
                    $("#P333").hide();
                } else {
                    $("#P333").show();
                }
        })
        $('#P24').on('change',function(){
            if (this.checked) {
                    $("#P343").hide();
                } else {
                    $("#P343").show();
                }
        })
        $('#P25').on('change',function(){
            if (this.checked) {
                    $("#P353").hide();
                } else {
                    $("#P353").show();
                }
        })
        $('#P26').on('change',function(){
            if (this.checked) {
                    $("#P363").hide();
                } else {
                    $("#P363").show();
                }
        })
        $('#P27').on('change',function(){
            if (this.checked) {
                    $("#P373").hide();
                } else {
                    $("#P373").show();
                }
        })
        $('#P28').on('change',function(){
            if (this.checked) {
                    $("#P383").hide();
                } else {
                    $("#P383").show();
                }
        })
    });   
</script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Agregar Periodo
                        </h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($grupo,['route'=>['grupos.guardarPeriodo', $grupo], 'method'=>'PUT']) !!}    
                            <div class="container2">
                                <fieldset>
                                    <legend>Periodo 1</legend>
                                    <label id='P111'>
                                        <input type="checkbox" name="periodo1[]" id='P11' value="Unidad1"> Unidad 1
                                    </label>
                                    <label id='P121'>
                                        <input type="checkbox" name="periodo1[]" id='P12' value="Unidad2"> Unidad 2
                                    </label>
                                    <label id='P131'>
                                        <input type="checkbox" name="periodo1[]" id='P13' value="Unidad3"> Unidad 3
                                    </label>
                                    <label id='P141'>
                                        <input type="checkbox" name="periodo1[]" id='P14' value="Unidad4"> Unidad 4
                                    </label>
                                    <label id='P151'>
                                        <input type="checkbox" name="periodo1[]" id='P15' value="Unidad5"> Unidad 5
                                    </label>
                                    <label id='P161'>
                                        <input type="checkbox" name="periodo1[]" id='P16' value="Unidad6"> Unidad 6
                                    </label>
                                    <label id='P171'>
                                        <input type="checkbox" name="periodo1[]" id='P17' value="Unidad7"> Unidad 7
                                    </label>
                                    <label id='P181'>
                                        <input type="checkbox" name="periodo1[]" id='P18' value="Unidad8"> Unidad 8
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <legend>Periodo 2</legend>
                                    <label id='P212'>
                                        <input type="checkbox" name="periodo2[]" id='P21' value="Unidad1"> Unidad 1
                                    </label>
                                    <label id='P222'>
                                        <input type="checkbox" name="periodo2[]" id='P22' value="Unidad2"> Unidad 2
                                    </label>
                                    <label id='P232'>
                                        <input type="checkbox" name="periodo2[]" id='P23' value="Unidad3"> Unidad 3
                                    </label>
                                    <label id='P242'>
                                        <input type="checkbox" name="periodo2[]" id='P24' value="Unidad4"> Unidad 4
                                    </label>
                                    <label id='P252'>
                                        <input type="checkbox" name="periodo2[]" id='P25' value="Unidad5"> Unidad 5
                                    </label>
                                    <label id='P262'>
                                        <input type="checkbox" name="periodo2[]" id='P26' value="Unidad6"> Unidad 6
                                    </label>
                                    <label id='P272'>
                                        <input type="checkbox" name="periodo2[]" id='P27' value="Unidad7"> Unidad 7
                                    </label>
                                    <label id='P282'>
                                        <input type="checkbox" name="periodo2[]" id='P28' value="Unidad8"> Unidad 8
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <legend>Periodo 3</legend>
                                    <label id='P313'>
                                        <input type="checkbox" name="periodo3[]" id='P31' value="Unidad1"> Unidad 1
                                    </label>
                                    <label id='P323'>
                                        <input type="checkbox" name="periodo3[]" id='P32' value="Unidad2"> Unidad 2
                                    </label>
                                    <label id='P333'>
                                        <input type="checkbox" name="periodo3[]" id='P33' value="Unidad3"> Unidad 3
                                    </label>
                                    <label id='P343'>
                                        <input type="checkbox" name="periodo3[]" id='P34' value="Unidad4"> Unidad 4
                                    </label>
                                    <label id='P353'>
                                        <input type="checkbox" name="periodo3[]" id='P35' value="Unidad5"> Unidad 5
                                    </label>
                                    <label id='P363'>
                                        <input type="checkbox" name="periodo3[]" id='P36' value="Unidad6"> Unidad 6
                                    </label>
                                    <label id='P373'>
                                        <input type="checkbox" name="periodo3[]" id='P37' value="Unidad7"> Unidad 7
                                    </label>
                                    <label id='P383'>
                                        <input type="checkbox" name="periodo3[]" id='P38' value="Unidad8"> Unidad 8
                                    </label>
                                </fieldset>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Guardar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        {!!Form::close()!!}
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
