@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    {{ __('Calificaciones')  }} del grupo {{-- {{$users[0]->id}} --}}

                    <p class="text-secondary"> utilice la tecla tab para avanzar al siguiente alumno
<br>
                            Precione enter para guardar
                    </p>
                </div>
                <div class="card-body">
                    {!! Form::model($grupos,['route'=>['grupos.guardarCalificaciones', $grupos], 'method'=>'PUT']) !!}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>nombre </th>
                                    <th scope="col">Unidad 1 </th>
                                    <th scope="col">Unidad 2</th>
                                    <th scope="col">Unidad 3</th>
                                    <th scope="col">Unidad 4uytihkj</th>
                                    <th scope="col">Promedio </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $alumno)
                                <tr>

                                    <th scope="row">
                                        {{$alumno->name}}

                                        <input type="hidden" name='user_id[]' value="{{$alumno->user_id}}">
                                    </th>

                                    <th>
                                        <input name='unidad1[]' class='col-xl-5' type="text"
                                            value="{{$alumno->unidad1}} " tabindex="1">
                                    </th>

                                    <th scope="row">
                                        <input name="unidad2[]" class='col-xl-5' type="text"
                                            value="{{$alumno->unidad2}} " tabindex="2">
                                    </th>

                                    <th scope="row">
                                        <input name="unidad3[]" class='col-xl-5' type="text"
                                            value="{{$alumno->unidad3}} " tabindex="3">
                                    </th>

                                    <th scope="row">
                                        <input name="unidad4[]" class='col-xl-5' type="text"
                                            value="{{$alumno->unidad3}} " tabindex="4">
                                    </th>



                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        <button class="btn btn-primary">guardar</button>

                    {!!Form::close()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
