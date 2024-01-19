<?php
echo '<link rel="stylesheet" type="text/css" href="estilos.css">';
echo '<div class="regDer">';
echo'<h1 align="center" style="font-family:Elephant">ACTUALIZACION DE DATOS</h1>';
include('conexion.php');
$id = $_GET['id']; //recuperar el valor enviado

//preparar el query para seleccionar todo:
$query0 = 'SELECT * FROM productos WHERE id_productos = '.$id.';';

//ejecutar query:
$rs =mysqli_query($con,$query0) or die("Error de consulta");

while($dato = mysqli_fetch_assoc($rs)){
    echo'<form method="post" align="center">';
    echo'<span class="textoPod">ID:</span><input type"text" value="'.$dato['id_productos'].'" readonly="readonly" name="caja_Id" class="cajaProd"><br>
    <span class="textoPod">NOMBRE:</span><input type="text" value="'.$dato['nombre'].'" name="caja_Nombre" class="cajaProd"><br>
    <span class="textoPod">CANTIDAD:</span><input type="text" value="'.$dato['cantidad'].'" name="caja_Cantidad" class="cajaProd"><br>
    <span class="textoPod">PRECIO COMPRA:</span><input type="text" value="'.$dato['p_compra'].'" name="caja_Comp" class="cajaProd"><br>
    <span class="textoPod">PRECIO VENTA:</span><input type="text" value="'.$dato['p_venta'].'" name="caja_Vent" class="cajaProd"><br>';
    echo'<button type="submit">ACTUALIZAR INFORMACION</button>';
    echo'</form>';
}
//ejecutar la actualizacion
if($_POST){
    $query1 = 'UPDATE productos SET nombre="'.$_POST['caja_Nombre'].'", cantidad="'.$_POST['caja_Cantidad'].'",
    p_compra="'.$_POST['caja_Comp'].'", p_venta="'.$_POST['caja_Vent'].'" WHERE id_productos='.$_POST['caja_Id'].';';
    mysqli_query($con,$query1) or die("Error de la actualizacion");
    echo'<center><b><font color="green">Actualizacion exitosa</font><b>
    <br>
    <a href="verProductos.php">Editar otro usuario</a></center>';
}
//cerrar la conexion:
mysqli_close($con);
?>
