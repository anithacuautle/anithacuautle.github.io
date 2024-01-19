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
  <body background="pruebas/imr.jpg">
    <center>
    <form action="verVentas.php" method="post">
        <button type="button" onclick="javascript:window.print();" class="impresion" style="border-radius: 10px; background:Slategray; font-family: Comic sans MS;" >IMPRIMIR</button>
    </form></center>
  </body>
<?php
include('conexion.php');
//preparar la sentencia para la consulta:
$query = 'SELECT * FROM ventas;';

//ejecutar la consulta
$rs = mysqli_query($con,$query);
//mostrar los trader_cdlrisefall3methods
echo '<h1 align="center" style="font-family:Elephant; color:#FF0000">LISTADO DE VENTAS</h1>';
echo '<table border="1"bgcolor="tan" align="center" width=50%; style="font-family:Gill Sans MT">

<td style="color:Yellow" align="center"><b>ID_VENTA</b></td>
<td style="color:Yellow" align="center"><b>FECHA</b></td>
<td style="color:Yellow" align="center"><b>ID_CLIENTE</b></td></tr>';

while($dato=mysqli_fetch_assoc($rs)){
echo'<tr>
    <td align="center">'.$dato['id_venta'].'</td>
    <td align="center">'.$dato['fecha'].'</td>
    <td align="center">'.$dato['id_cliente'].'</td>
    <td>
<a href="remision.php?id='.$dato['id_venta'].'"><img src="pruebas/remi.jpg" width="20" title="Nota de remisión"></a>
         </td>
</tr>';

}

echo '</table>';
//cerrar la conexion
mysqli_close($con);
 ?>