<?php
include('conexion.php');

//preparar la sentencia para la consulta:
$query = 'SELECT * FROM usuarios;';

//ejecutar la consulta
$rs = mysqli_query($con,$query);

//mostrar los trader_cdlrisefall3methods
echo '<h1 align="center">LISTADO DE USUARIOS</h1>';
while ($dato = mysqli_fetch_assoc($rs)) {
  echo  '
   <a href="eliminar.php?id='.$dato['id_usuario'].'">ELIMINAR</a>|
    <a href="actualizar.php?id='.$dato['id_usuario'].'">ACTUALIZAR</a><br>
  <b>ID:</b>'.$dato['id_usuario'].'<br><b>Nombre:</b>'.$dato['nombre'].'<br><b>Apellido paterno:</b>'
  .$dato['paterno'].'<br><b>Apellido materno:</b>'.$dato['materno'].'<br><b>Correo:</b>'
  .$dato['correo'].'<br><b>Usuario:</b>'.$dato['usuario'].'<br><b>Password:</b>'
  .$dato['password'].'<hr color="pink">';

}

 ?>
