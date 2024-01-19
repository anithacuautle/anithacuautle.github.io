<?php
echo'<h1>ACTUALIZACION DE DATOS</h1>';
include('conexion.php');

//prepara el query para seleccionar todo:
$query0='select * from usuarios;';

//ejecutar query:
$rs=mysqli_query($con,$query0) or die("Error de consulta");

while($dato=mysqli_fetch_assoc($rs)){
    echo'<form>';
    echo'ID:<imput'
}