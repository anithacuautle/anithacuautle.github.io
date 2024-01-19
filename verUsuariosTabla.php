<!DOCTYPE html>
<html lang="es">
<head>
  <style>
    @media print {
    .impresion{display: none;}
    }
  </style>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <center>
  <form action="menu.html" method="post">
    <br>
    <button type="submit" name="btnRegreso"  class="botonRegresar">Regresar</button>
  </form></center>
</body>
</html>
<?php
include('conexion.php');

//preparar la sentencia para la consulta:
$query = 'SELECT * FROM usuarios;';

//ejecutar la consulta
$rs = mysqli_query($con,$query);

//mostrar los trader_cdlrisefall3methods
echo '<h1 align="center" style="font-family:Elephant">LISTADO DE USUARIOS</h1>';
echo '<button type="button" onclick="javascript:window.print();" class="impresion">IMPRIMIR</button>';
echo '<table border="1" bgcolor="lightgrey" align="center" width=80%; style="font-family:Gill Sans MT">
<tr>
<td><b>No.</b></td>
<td><b>Nombre completo</b></td>
<td><b>Correo</b></td>
<td><b>Usuario</b></td>
<td><b>Password</b></td>
<td><b>Accion</b></td>
</tr>';

while ($dato = mysqli_fetch_assoc($rs)) {
echo '<tr>
<td>'.$dato['id_usuario'].'</td>
<td>'.$dato['nombre'].' '.$dato['paterno'].' '.$dato['materno'].'</td>
<td>'.$dato['correo'].'</td>
<td>'.$dato['usuario'].'</td>
<td>'.$dato['password'].'</td>
<td>
<a href="delete.php?id='.$dato['id_usuario'].'"><img src="pruebas/eliminar.jpg" width="20" title="Eliminar Usuario"></a>
<a href="actualizar.php?id='.$dato['id_usuario'].'"><img src="pruebas/editar.png" width="40" title="Editar Usuarios"></a>
</td>

</tr>';
}

echo '</table>';
//cerrar la conexion
mysqli_close($con);
 ?>
