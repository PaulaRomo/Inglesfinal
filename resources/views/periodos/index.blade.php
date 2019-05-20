@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Periodos</h4>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Periodo</th>
                        <th>Inicia</th>
                        <th>Termina</th>
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($periodos as $periodo)
                        <tr>
                          <td>{{ $periodo->periodo }}</td>
                          <td>{{ $periodo->inicio }}</td>
                          <td>{{ $periodo->fin }}</td>
                          <td width="10px">
                          <a style="background-color:orange; border:orange;" href="{{ route('periodo.edit', $periodo->id ) }}"
                              class="btn btn-sm btn-success">
                                Editar
                              </a>
                          </td>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $periodos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection