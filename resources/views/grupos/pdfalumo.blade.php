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
      <h1 style="font-size:16px;">ALUMNOS INSCRITOS EN INGLES</h1>
        <div class="datagrid">

          <TABLE WIDTH=100% cellpadding="0" cellspacing="0">
            <thead>
            <TR>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">NIVEL</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">ALUMNOS</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">ALUMNAS</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">EXTERNOS</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">EXTERNAS</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">TOTAL</TD>
              <TD ALIGN=center ROWSPAN=1 style="background:#E9E9E9; font-weight:bold; border: black .5px solid;">sub-total</TD>
            </TR>
            </thead>
          <thead>
            @foreach ($arrayFinal as $key => $value)
              <tr>
                  <td style="border: black .5px solid;">{{ $value['nombre_grupo'].$value['nivel'] }}</td>
                  <td style="border: black .5px solid;">{{ $value['alumnos'] }}</td>
              		<td style="border: black .5px solid;">{{ $value['alumnas'] }}</td>
              		<td style="border: black .5px solid;">{{ $value['alumnosex'] }}<center></center></td>
                  <td style="border: black .5px solid;">{{ $value['alumnasex'] }}</td>
                  <td style="border: black .5px solid;">{{ $value['alumnostot'] }}</td>
                  <td style="border: black .5px solid;">{{ $value['subtotal'] }}</td>
            	</tr>
            @endforeach
          </thead>
          </TABLE>
          <br>
          <br>
          <br>
          <br>
          <hr style="width: 200px;"><center>Firma del Profesor<br>{{ $today }}</center>
          </div>
      </body>
</html>
