<?php
  $page_title = 'Lista de desconexiones';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  //$clientes = join_inv_cliente_table();
?>
<?php

 $salida="";
 $query = "SELECT c.*, d.* FROM inv_cliente c INNER JOIN inv_desconexion d ON c.num_cuenta = d.cod_cuenta WHERE c.estado='1' AND d.ejecutada='SI' ORDER By d.cod_cuenta ASC";
 
 if(isset($_POST['consulta'])){
		$q = $_POST['consulta'];
		$query = ("SELECT d.cod_cuenta, c.cod_cliente, c.nombre, c.apellido, d.motivo, d.fecha_ejecucion, d.observacion FROM inv_cliente c INNER JOIN inv_desconexion d ON c.num_cuenta=d.cod_cuenta  WHERE d.cod_cuenta LIKE '%".$q."%' OR c.nombre LIKE '%".$q."%' OR c.apellido LIKE '%".$q."%'");	
	}
	
	$resultado = $db->query($query);


          if($resultado->num_rows > 0){
		
		$salida.="<table class='table table-bordered'>
				  <thead>
				    <tr>
						<th class='text-center' style='width: 20%;'>Cuenta</th>
						<th class='text-center' style='width: 20%;'>Nombres</th>
						<th class='text-center' style='width: 20%;'>Apellidos</th>
						<th class='text-center' style='width: 20%;'>Motivo</th>
						<th class='text-center' style='width: 20%;'>Fech. Ejecutado</th>
						<th class='text-center' style='width: 20%;'>Observación</th>
						<th class='text-center' style='width: 60px;'>Acción</th>
					</tr>
				  </thead>
				  <tbody>";
		while ($fila = $resultado->fetch_assoc()){
			$salida.="<tr>
					<td class='text-center'>".$fila['cod_cuenta']."</td>
					<td class='text-center'>".$fila['nombre']."</td>
					<td class='text-center'>".$fila['apellido']."</td>
					<td class='text-center'>".$fila['motivo']."</td>
					<td class='text-center'>".$fila['fecha_ejecucion']."</td>
					<td class='text-center'>".$fila['observacion']."</td>
					<td class='text-center'>
					<div class='btn-group'>
				    
					<a href='edit_cliente2.php?id=$fila[cod_cuenta]' class='btn btn-info btn-xs'  title='Cargar' data-toggle='tooltip'>
                     <span class='glyphicon glyphicon-export'></span>
                    </a>
					</div>
					</td>
			  </tr>";
		}
		
		$salida.="</tbody></table>";
	} else {
		$salida.="No hay datos :(";
	}
	
	echo $salida;
	//$db->close();
	
?>
