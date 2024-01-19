<style>
    tr{
        height: 25px;
    }
    @media print {
    .impresion{display: none;}
        
    }
</style>
<body background="pruebas/alices.jpg">
    <center>
        
    <form action="verVentas.php" method="post">
      
      <button type="submit" name="btnRegreso"  class="impresion" style="border-radius: 10px; background:Slateblue; font-family: Comic sans MS;">REGRESAR</button>
        <button type="button" onclick="javascript:window.print();" class="impresion" style="border-radius: 10px; background:lime; font-family: Comic sans MS;" >IMPRIMIR</button>
    </form></center>
  </body>
<?php
include('conexion.php');
$id = $_GET['id'];
//query para generar el folio:

$query1='SELECT * FROM reporte6 WHERE id_venta = '.$id.';';
$rs1= mysqli_query($con,$query1)or die("Error de consulta");
$dato=mysqli_fetch_assoc($rs1);

$query2='SELECT * FROM reporte4 where id_detVenta='.$id.';';
$rs2= mysqli_query($con,$query2)or die("Error de consulta");

$query3='SELECT SUM(importe) AS "subtotal" from reporte4 where id_detVenta='.$id.';';
$rs3= mysqli_query($con,$query3)or die("Error de consulta");
$dato3=mysqli_fetch_assoc($rs3);

$iva=$dato3['subtotal']*0.16;

$total=$dato3['subtotal']+$iva;


echo'<table border="1" bgcolor=Mistyrose align="center">';
echo'<tr>
<td colspan="2" style="color:blue" align="center">NOTA DE REMISIÓN<br><img src="pruebas/com.png" width="40"></td>

<td><b>FECHA:</b>'.date('d/m/y').'</td>
<td style="color:red"><b>FOLIO:</b>'.$dato['id_venta'].'</td></tr>';
echo'<tr>
<td colspan="4"><b>NOMBRE DEL CLIENTE:</b>'.$dato['nombre'].' '.$dato['materno'].' '.$dato['paterno'].'</td></tr>';
echo'<tr>
<td colspan="4"><b>DOMICILIO:</b>'.$dato['domicilio'].'</td></tr>';
echo'<tr>
<td><b>Cantidad</b></td>
<td><b>Concepto</b></td>
<td><b>Precio</b></td>
<td><b>Importe</b></td></tr>';
//ejecucion de un query
//la fila que sigue, es la que se repite con los datos comparados
while($dato2=mysqli_fetch_assoc($rs2)){
    echo'<tr>
    <td align="center">'.$dato2['cantidad'].'pz</td>
    <td align="center">'.$dato2['nombre'].'</td>
    <td align="center">'.$dato2['p_venta'].'</td>
    <td align="center">'.$dato2['importe'].'</td></tr>';

}
$fi=1;
while($fi<=10){
    echo'<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>&nbsp;</b></td>
    <td>&nbsp;</td></tr>';
$fi++;
}
echo'<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>Subtotal:</b></td>
    <td>$'.$dato3['subtotal'].'</td></tr>';
echo'<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>IVA:</b></td>
    <td>$'.$iva.'</td></tr>';
 echo'<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="color:red;font-family: Castellar;"><b>Total:</b></td>
    <td>$'.$total.'</td></tr>';
echo'<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><br><br><b>Firma de conformidad:</b></td>
    </tr>';
mysqli_close($con);

?>