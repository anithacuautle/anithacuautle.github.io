<?php

include('conexion.php');

$user =$_POST['caja_Usuario'];
$psw = $_POST['caja_Psw'];

date_default_timezone_set('America/Mexico_City');
$fecha = date('d/m/y');
$query0= 'INSERT INTO accesos(usuario,fecha) VALUES("'.$user.'","'.$fecha.'");';
mysqli_query($con,$query0) or die('Error de consulta');


$rs= 'SELECT *FROM usuarios WHERE usuario="'.$user.'"and password="'.$psw.'";';

$r= mysqli_query($con,$rs) or die("Error de consulta");

if (mysqli_num_rows($r)==1) {
  echo '<script>
  alert("BIENVENIDO");
  window.location="menu.html";
  </script>';
}else {
  echo '<script>
  alert("Datos incorrectos");
  window.location="index.html";
  </script>';
}
//mysqli_close($con);
 ?>
