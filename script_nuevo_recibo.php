<?php


include('../conexion/conexion.php'); //incluye datos de la conexion a la base de datos
include('../conexion/sesion.php');	// incluye datos de la sesion que indican al usuario activo

		//Vaciar la tabla tmp
		$vaciado1 = "truncate table recibo_linea_tmp";
		$result1 = mysqli_query($server, $vaciado1);
		
		
		
		//Header("Location: recibo_otros_servicios.php");
												
		?>
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=recibo_otro_servicios.php">
												
		<?php
		
		
		
?>
