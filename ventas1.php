<style>
    tr{
        height: 25px;
    }
    @media print {
    .impresion{display: none;}
        
    }
</style>
<?php
include('conexion.php');
//query para generar el folio:

$query1='SELECT * FROM ventas;';
$rs1= mysqli_query($con,$query1)or die("Error de consulta");




echo '<button type="button" onclick="javascript:window.print();" class="impresion" style="border-radius: 10px; background:brown; font-family: Comic sans MS;" >IMPRIMIR</button>';

echo'<table border="1" bgcolor=lightpink align="center">';
echo'<tr>
<td style="color:Yellow"><b>ID_VENTA</b></td>
<td style="color:Yellow"><b>FECHA</b></td>
<td style="color:Yellow"><b>ID_CLIENTE</b></td></tr>';
while($dato=mysqli_fetch_assoc($rs1)){
echo'<tr>
    <td align="center">'.$dato['id_venta'].'</td>
    <td>'.$dato['fecha'].'</td>
    <td>'.$dato['id_cliente'].'</td></tr>';
}
mysqli_close($con);
?>