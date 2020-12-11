<?php
require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  error_reporting(0);
//consulta todos los servicios del recibo
$query_rec= "SELECT * FROM recibo_linea_tmp ORDER BY cod_servicio";
$result_rec= $db->query($query_rec);
//$row = mysqli_fetch_array($result_rec);


  /*while($row = mysqli_fetch_array($sql)){
  echo "<tr>";
  	echo "<td width='15%'>".$row['cod_servicio']."</td>";
  	echo "<td width='70%'>".$row['nombre']."</td>";
  	echo "<td width='15%'>".$row['costo']."</td>";
  	echo "</tr>";
  }
  */
  
  
  echo '<table Width="100%" cellspacing="0" cellpadding="0"  style="border: solid 1px silver;">';
	$num_fila = 0;
	while ($row = mysqli_fetch_array($result_rec))
	{
		$bgcolor1 = " '#CED8F6' "; // color sobre seleccion 
		$bgcolor2 = " '#ffffff' ";// color original blanco 
		$bgcolor3 = " '#EEE9FD' ";// color original 2
									
	echo '<tr '; 
	if ($num_fila%2==0) 
	echo 'bgcolor=#ffffff onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor2.';"' ; //si el resto de la división es 0 pongo un color 
	else 
	echo 'bgcolor=#EEE9FD onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor3.';"'; //si el resto de la división NO es 0 pongo otro color 
														 
	echo '> '; 
														
	echo"
		<td><input type='hidden' value='".$row['cod_servicio']."'> </td>
		<td Width='15%'>&nbsp;".$row['cod_servicio']."</td>
		<td Width='55%'>".$row['nombre']."</td>
		<td Width='15%'>".$row['costo']."</td>
																						
		<td Width='15%' align='center'>											
		&nbsp;	<a style=\"cursor:pointer;\" title='Eliminar Linea' onclick=\"eliminarDato('".$row['cod_servicio']."')\"><img src='../images/ico/del.png' width='20'></a>
		</td>
		</tr>";
		$num_fila++; 
		$total+=$row['costo']; 
	}
	//mysqli_free_result($sql);
	echo '</table>';
	
	
?>