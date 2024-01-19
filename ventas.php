<?php
include('conexion.php');

//preparara el query
$query0='SELECT * FROM productos ORDER BY nombre ASC;';

//ejecutar el query:
$rs= mysqli_query($con,$query0)or die ("Error de consulta");

echo '<form action="vender.php" method="post">';
echo 'Producto:';
echo '<select name="producto">';
while ($dato=mysqli_fetch_assoc($rs)) {
  echo '<option value="'.$dato['nombre'].'">'.$dato['nombre'].'</option>';
}
echo '</select>';
echo 'Cantidad:<input type="number" name="caja_Cantidad">';
echo '<img src="pruebas/add.png"  width="30">';
 ?>
