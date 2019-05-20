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
      <h1 style="font-size:16px;">{{ $gru }}</h1>
      <div class="datagrid">
        <TABLE WIDTH=100% cellpadding="0" cellspacing="0">
          <thead>
          <TR>
            <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NO</TD>
            <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">CONTROL</TD>
            <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NOMBRE DE ALUMNO</TD>
            <TD ALIGN=center ROWSPAN=2 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NIVEL</TD>
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
          @foreach ($finalcali as $num =>$alumno)
          <thead>
            <tr>
              <td style="border: black .5px solid;">{{$num+1}}</td>
              <td style="border: black .5px solid;">{{$final[$num]->numcontrol}}</td>
              <td style="border: black .5px solid;">{{$al[$num]->name}}</td>
              <td style="border: black .5px solid;">{{$alumno->nivelActual}}</td>

              <td style="border: black .5px solid;">{{$alumno->unidad1}}</td>
              <td style="border: black .5px solid;">{{$alumno->unidad2}}</td>
          		<td style="border: black .5px solid;">{{$alumno->unidad3}}</td>
          		<td style="border: black .5px solid;">{{$alumno->unidad4}}</td>
              <td style="border: black .5px solid;">{{$alumno->unidad1}}</td>
              <td style="border: black .5px solid;">{{$alumno->unidad2}}</td>
              <td style="border: black .5px solid;">{{$alumno->unidad3}}</td>
              <td style="border: black .5px solid;">{{$alumno->unidad4}}</td>
          	</tr>
          </thead>
            @endforeach
        </table>
      </div>
    </body>
</html>
