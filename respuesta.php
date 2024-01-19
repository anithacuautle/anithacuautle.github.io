<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_POST['vienedelform'] == 'si') {
			if ($_POST['nombre'] != '') {
				echo 'Hola ' . $_POST['nombre'];
			}else{
				echo 'Has olvidado poner tu nombre';
			}
		}
	}else{
		echo 'Ha ocurrido un error';
	}
?>
