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
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; }
      	.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
      	.datagrid table td, .datagrid table th { padding: 3px 10px; }
      	.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; }
      	.datagrid table thead th:first-child { border: none; }
      	.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }
      	.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }
      	.datagrid table tbody td:first-child { border-left: none; }
      	.datagrid table tbody tr:last-child td { border-bottom: none; }
      	.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px }
      	.datagrid table tfoot td div{ padding: 2px; }
      	.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }
      	.datagrid table tfoot  li { display: inline; }
      	.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }
      	.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
    </style>
    </head>
    <body>
      <h1 style="font-size:40px; margin-top: 20px;" ><img style="height:70px; width:70px; margin-top: 30px;" src={{ asset ('img/logo.png') }} alt="">Control de Inglés</h1>
      <hr>
      <br>
      <div class="datagrid">
        <table>
          <thead>
          	<tr>
              <th>Fecha</th>
          		<th>Nombre del Grupo</th>
          		<th>Periódo</th>
          		<th>Nivel</th>
          		<th>Docente</th>
          	</tr>
          </thead>
          <tbody>
          	<tr>
              <td><p>{{$today}}</p></td>
          		<td><p>{{$grupo['nombre_grupo']}}</p></td>
          		<td><p>{{$grupo['periodo']}}</p></td>
          		<td><p>{{$grupo['nivel']}}</p></td>
          		<td><p>{{$grupo['docente']}}</p></td>
          	</tr>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <center><h3>Alumnos</h3></center>

      <div class="datagrid">
        <table>
          <thead>
          	<tr>
              <th>ID</th>
          		<th>No. Control</th>
          		<th>Nombre Completo</th>
              <th>Interno/Externo</th>
          		<th>Sexo</th>
          		<th>Carrera</th>
          	</tr>
          </thead>
          <tbody>
          	<tr>
              <td><p>{{$today}}</p></td>
          		<td><p>{{$grupo['nombre_grupo']}}</p></td>
          		<td><p>{{$grupo['periodo']}}</p></td>
          		<td><p>{{$grupo['nivel']}}</p></td>
              <td><p>{{$grupo['nivel']}}</p></td>
          		<td><p>{{$grupo['docente']}}</p></td>
          	</tr>
          </tbody>
        </table>
      </div>
    </body>
</html>
