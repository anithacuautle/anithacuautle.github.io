<?php

echo'<h1 align="center">ACTUALIZACION DE DATOS</h1>';
include('conexion.php');
$id = $_GET['id']; //recuperar el valor enviado

//preparar el query para seleccionar todo:
$query0 = 'SELECT * FROM usuarios WHERE id_usuario = '.$id.';';

//ejecutar query:
$rs =mysqli_query($con,$query0) or die("Error de consulta");

while($dato = mysqli_fetch_assoc($rs)){
    echo'<form method="post" align="center">';
    echo'ID:<input type"text" value="'.$dato['id_usuario'].'" readonly="readonly" name="caja_Id"><br>
    NOMBRE:<input type="text" value="'.$dato['nombre'].'" name="caja_Nombre"><br>
    APELLIDO PATERNO:<input type="text" value="'.$dato['paterno'].'" name="caja_Paterno"><br>
    APELLIDO MATERNO:<input type="text" value="'.$dato['materno'].'" name="caja_Materno"><br>
    CORREO:<input type="text" value="'.$dato['correo'].'" name="caja_Correo"><br>
    USUARIO:<input type="text" value="'.$dato['usuario'].'" readonly="readonly" name="caja_Usuario"><br>
    PASSWORD:<input type="text" value="'.$dato['password'].'" name="caja_Psw"><br>';
    echo'<button type="submit">ACTUALIZAR INFORMACION</button>';
    echo'</form>';;
}
//ejecutar la actualizacion
if($_POST){
    $query1 = 'UPDATE usuarios SET nombre="'.$_POST['caja_Nombre'].'", paterno="'.$_POST['caja_Paterno'].'",
    materno="'.$_POST['caja_Materno'].'", correo="'.$_POST['caja_Correo'].'",usuario="'.$_POST['caja_Usuario'].'"
    , password="'.$_POST['caja_Psw'].'" WHERE id_usuario='.$_POST['caja_Id'].';';
    mysqli_query($con,$query1) or die("Error de la actualizacion");
    echo'<center><b><font color="green">Actualizacion exitosa</font><b>
    <br>
    <a href="verUsuariosTabla.php">Editar otro usuario</a></center>';
}
//cerrar la conexion:
mysqli_close($con);
?>
