<?php
include('conexion.php');

//obtener datos del formulario
$nombre = $_POST['caja_Nombre'];
$paterno = $_POST['caja_Paterno'];
$materno = $_POST['caja_Materno'];
$correo = $_POST['caja_Correo'];
//.'@'.$_POST['lst_Dominio']
$psw = $_POST['caja_Psw'];


$usuario = $paterno.'.'.rand(1,100);
//validar que el usuario nuevo no exista:
$query0='SELECT *FROM usuarios WHERE usuario="'.$usuario.'" or paterno="'.$paterno.'" or materno="'.$materno.'" or correo="'.$correo.'" or usuario="'.$usuario.'" ;';
//ejecutar el $query0:
$filas= mysqli_query($con,$query0) or die("Error de consulta");
$encontrados= mysqli_num_rows($filas);
if($encontrados ==0){


$query = 'INSERT INTO usuarios(nombre,paterno,materno,correo,usuario,password)
VALUES("'.$nombre.'","'.$paterno.'","'.$materno.'","'.$correo.'","'.$usuario.'",
  "'.$psw.'");';

  mysqli_query($con,$query) or die("Error de consulta");
  echo '<b>El ususario ha sido registrado correctamente</b><br>
  Tus datos de inicio de sesión:<br>
  <b>Usuario:</b>'.$usuario.'<br>
  <b>Password:</b>'.$psw;
  echo '<br><a href="regUsuarios.html">Registrar otro usuario</a>
  <a href="login.html">Iniciar sesión</a>';
}else {
  echo '<h1>EL Usuario ya Existe</h1>';
  echo '<br><a href="regUsuarios.html">Registrar nuevament</a>';
}
  mysqli_close($con);

?>
