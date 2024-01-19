<?php

echo'<h1 align="center">DATOS ELIMINADOS</h1>';
include('conexion.php');
$id = $_GET['id']; //recuperar el valor enviado

//preparar el query para seleccionar todo:
$query0 = 'delete from productos WHERE id_productos = '.$id.';';

//ejecutar query:
mysqli_query($con,$query0) or die("Error de consulta");

  echo '<br><a align="center" style="font-family:Elephant"> Producto Eliminado</a>';
  echo '<br><a href="regProducto.html" align="center" style="font-family:Elephant">Ingresa Otro Producto</a>';
  echo '<br><a href="menu.html" align="center" style="font-family:Elephant">Menu</a>';


//cerrar la conexion:
mysqli_close($con);
?>
