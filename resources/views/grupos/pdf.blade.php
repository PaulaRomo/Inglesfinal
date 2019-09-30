<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        td{
        font-size: 12px;
        }
        TABLE TD{
        border-collapse: collapse;
        border: black 1px solid;
        padding: 0;
        border: none;
        }
        </style>

    </head>
    <body>
      <h1 style="font-size:16px; margin-top: 10px;" ><img style="height:70px; width:70px; margin-top: 20px;" src={{ public_path ('img/logo.png') }} alt=""><br>INSTITUTO TECNOLOGICO SUPERIOR ZACATECAS SUR</h1>
      <h1 style="font-size:16px;">INGLÉS</h1>
      <div class="datagrid">
        <TABLE BORDER WIDTH="100%" HEIGHT="10px" align:"center">
            <TR>
              <TD style="font-weight: bold; text-align:center;">NIVEL</TD> <TD style="text-align:center;">{{$grupo['nombre_grupo']}} </TD><TD style="font-weight: bold; text-align:center;">PROFESOR</TD> <TD style="text-align:center;"><?php
                $idUs=DB::table('user_doc__grups')->where('grup_id',$grupo->id)->pluck('user_id');
                if(count($idUs)>0){
                  $idUser=DB::table('users')->where('id',$idUs[0])->pluck('name');
                  if(count($idUser)>0){
              ?>
                    {{ $idUser[0]}}
              <?php
                  }
                }
              ?></TD>
            </TR>
            <TR>
              <TD style="font-weight: bold; text-align:center;">HORARIO</TD> <TD style="text-align:center;"><?php
                $hay=DB::table('user_alum__grups')->where('grup_id',$grupo->id)->pluck('user_id');
                $dias=DB::table('dias')->where('grupos_id',$grupo->id)->get();
                $horario='';
                $di='';
                if(count($dias)>0){
                  if($dias[0]->lunes){
                    $horario=$dias[0]->lunes;
                    $di=$di.' '.'Lunes';
                  }
                  if($dias[0]->martes){
                    $horario=$dias[0]->martes;
                    $di=$di.' '.'Martes';
                  }
                  if($dias[0]->miercoles){
                    $horario=$dias[0]->miercoles;
                    $di=$di.' '.'Miercoles';
                  }
                  if($dias[0]->jueves){
                    $horario=$dias[0]->jueves;
                    $di=$di.' '.'Jueves';
                  }
                  if($dias[0]->viernes){
                    $horario=$dias[0]->viernes;
                    $di=$di.' '.'Viernes';
                  }
                  if($dias[0]->sabado){
                    $horario=$dias[0]->sabado;
                    $di=$di.' '.'Sabado';
                  }
              ?>
                  {{$di}}
              <?php
                }
              ?>{{ $horario }}</TD> <TD style="font-weight: bold; text-align:center;">PERÍODO</TD><TD style="text-align:center;">{{$grupo['periodo']}}</TD>
            </TR></TABLE2></div>
        <div class="datagrid">
          <TABLE WIDTH=100% cellpadding="0" cellspacing="0">
            <thead>
            <TR>
              <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NO</TD>
              <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">CONTROL</TD>
              <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NOMBRE DE ALUMNO</TD>
              <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">PLAN EST.</TD>
              <TD ALIGN=center COLSPAN=8 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">CALIFICACIÓN UNIDAD</TD>
            </TR>

            <TR>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">1</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">2</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">3</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">4</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">5</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">6</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">7</TD>
              <TD ALIGN=center style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">8</TD>
            </TR>
            </thead>
          @foreach ($alumnosxGrupo as $num => $alumno)
          <thead>
            <tr>
              <td style="border: black .5px solid;">{{$num+1}}</td>
              <td style="border: black .5px solid;">{{$final[$num]->numcontrol}}</td>
          		<td style="border: black .5px solid;">{{ $alumno->ap.' '.$alumno->am.' '.$alumno->name}}</td>
          		<td style="border: black .5px solid;"><center>{{$final[$num]->carrera}} {{$final[$num]->semestre}}</center></td>
              @if ($alumno->unidad1<70 && $alumno->unidad1>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad1}}</center></td>
              @endif
              @if ($alumno->unidad2<70 && $alumno->unidad2>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad2}}</center></td>
              @endif
              @if ($alumno->unidad3<70 && $alumno->unidad3>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad3}}</center></td>
              @endif
              @if ($alumno->unidad4<70 && $alumno->unidad4>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad4}}</center></td>
              @endif
              @if ($alumno->unidad5<70 && $alumno->unidad5>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad5}}</center></td>
              @endif
              @if ($alumno->unidad6<70 && $alumno->unidad6>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad6}}</center></td>
              @endif
              @if ($alumno->unidad7<70 && $alumno->unidad7>0)
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad7}}</center></td>
              @endif
              @if (($alumno->unidad8<70)&&($alumno->unidad8>0))
                <td style="background:#E9E9E9; border: black .5px solid;"><center>NA</center></td>
              @else
                <td style="border: black .5px solid;"><center>{{$alumno->unidad8}}</center></td>
              @endif
          	</tr>
          </thead>
            @endforeach
          </TABLE>
          <br>
          <br>
          <br>
          <br>
          <hr style="width: 200px;"><center>Firma del Profesor<br>{{ $today }}</center>
          </div>
      </body>
</html>
