<?php 
  //$page_title = 'Reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$reg_desconexion = inv_desconexion_table();
//$all_categories = find_all('categories');
//$all_photo = find_all('media');
 //echo $rec_cliente['cod_cliente'];
 //sleep(2);
 //exit;

/*if(!$reg_desconexion){
  $session->msg("d","Cliente no encontrado por Codigo.",$rec_cliente);
  redirect('reg_desconexion.php');
}*/
?>

<?php 


 if(isset($_POST['reg_desconexion'])){
     echo $_POST['num_cuenta'];
	 
   $req_fields = array('num_cuenta','fecha_rec','nombres_rec','apellidos_rec', 'motivo_rec','fecha_eje','solucion_des','detalle_des');
   validate_fields($req_fields);
   if(empty($errors)){
     
     $c_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
     $c_fecharec   = remove_junk($db->escape($_POST['fecha_rec']));
     $c_nombresrec   = remove_junk($db->escape($_POST['nombres_rec']));
     $c_apellidosrec  = remove_junk($db->escape($_POST['apellidos_rec']));
     $c_motivorec  = remove_junk($db->escape($_POST['motivo_rec']));
	 $c_fechaeje  = remove_junk($db->escape($_POST['fecha_eje']));
	 $c_soluciondes  = remove_junk($db->escape($_POST['solucion_des']));
     if (is_null($_POST['detalle_des']) || $_POST['detalle_des'] === "") {
       $asigna_m = '0';
     } else {
       $c_detalledes = remove_junk($db->escape($_POST['detalle_des']));
     }
  
     
	 	   
	 $query  = "INSERT INTO inv_desconexion (cod_cuenta,fecha_orden,motivo,fecha_ejecucion,ejecutada,observacion) VALUES ('{$c_numcuenta}','{$c_fecharec}','{$c_motivorec}', '{$c_fechaeje}','{$c_soluciondes}','{$c_detalledes}')";
     
//Rutina desactivar cliente
if($c_soluciondes==="SI"){
	
  $query2 = "UPDATE inv_cliente SET estado='1' WHERE num_cuenta ='$c_numcuenta'";
  $result2 =$db->query($query2);   
	   
	}	
//fin rutina desactivar cliente 
	 
	   if($db->query($query)){
       $session->msg('s',"Desconexión agregado exitosamente. ");
       redirect('lis_desconexion.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('reg_desconexion.php', false);
     }
     	          

   } else{
       $session->msg("d", $errors);
       redirect('lis_desconexion.php',false);
   }

 }

?>
<?php //include_once('layouts/header.php'); ?>


<?php //include_once('layouts/footer.php'); ?>
