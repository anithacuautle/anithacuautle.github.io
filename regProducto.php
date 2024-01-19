<?php
//enlace del archivo de conexión
include('conexion.php');

//rescatar los valores del formulario:
$nombre = $_POST['caja_Nombre'];
$cantidad = $_POST['caja_Cantidad'];
$pc = $_POST['caja_Compra'];
$pv = $_POST['caja_Venta'];

//prepara la sentencia
$query = 'INSERT INTO productos(nombre,cantidad,p_compra,p_venta)
VALUES("'.$nombre.'",'.$cantidad.','.$pc.','.$pv.');';
//echo "QUERY".$query;

//ejecutar la query en el sgbd
mysqli_query($con,$query) or die("Error de query");
echo '<br>La consulta se ejecuto con exito';
echo '<br><a href="regProducto.html">Ingresar otro producto</a>';

mysqli_close($con);
 ?>
