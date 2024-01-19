<!DOCTYPE html>
<html lang="es">
  <head>
      <style>
        @media print {
        .impresion{display: none;}
        .botonRegresar{display: none;}
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
$query = 'SELECT * FROM productos;';

//ejecutar la consulta
$rs = mysqli_query($con,$query);
echo '<button type="button" onclick="javascript:window.print();" class="impresion">IMPRIMIR</button>';
//mostrar los trader_cdlrisefall3methods
echo '<h1 align="center" style="font-family:Elephant">LISTADO DE PRODUCTOS</h1>';
echo '<table border="1"bgcolor="lightgrey" align="center" width=50%; style="font-family:Gill Sans MT">
<tr>
<td><b>No.</b></td>
<td><b>Nombre de producto</b></td>
<td><b>Cantidad</b></td>
<td><b>Precio de compra</b></td>
<td><b>Precio de venta</b></td>
</tr>';

while ($dato = mysqli_fetch_assoc($rs)) {
echo '<tr>
<td>'.$dato['id_productos'].'</td>
<td>'.$dato['nombre'].'</td>
<td>'.$dato['cantidad'].'</td>
<td>'.$dato['p_compra'].'</td>
<td>'.$dato['p_venta'].'</td>
<td>
<a href="eliminar.php?id='.$dato['id_productos'].'"><img src="pruebas/eliminar.jpg" width="20" title="Eliminar Usuario"></a>
 <a href="actualizarP.php?id='.$dato['id_productos'].'"><img src="pruebas/editar.png" width="40" title="Editar Usuarios"></a><br>
         </td>
</tr>';

}

echo '</table>';
//cerrar la conexion
mysqli_close($con);
 ?>
