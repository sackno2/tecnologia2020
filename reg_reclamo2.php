<?php 
  //$page_title = 'Reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
//$rec_cliente = find_by_id2('inv_cliente',(int)$_GET['id']); 
$reg_reclamo = inv_reclamo_table();
//$all_categories = find_all('categories');
//$all_photo = find_all('media');
 //echo $rec_cliente['cod_cliente'];
 //sleep(2);
 //exit;

if(!$reg_reclamo){
  $session->msg("d","Cliente no encontrado por Codigo.",$rec_cliente);
  redirect('reg_reclamo.php');
}
?>

<?php 


 if(isset($_POST['reg_reclamo'])){
     echo $_POST['num_cuenta'];
   $req_fields = array('num_cuenta','fecha_rec','nombres_rec','apellidos_rec', 'motivo_rec','solucion_rec','detalle_rec');
   validate_fields($req_fields);
   if(empty($errors)){
     
     $c_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
     $c_fecharec   = remove_junk($db->escape($_POST['fecha_rec']));
     $c_nombresrec   = remove_junk($db->escape($_POST['nombres_rec']));
     $c_apellidosrec  = remove_junk($db->escape($_POST['apellidos_rec']));
     $c_motivorec  = remove_junk($db->escape($_POST['motivo_rec']));
	 $c_solucionrec  = remove_junk($db->escape($_POST['solucion_rec']));
     if (is_null($_POST['detalle_rec']) || $_POST['detalle_rec'] === "") {
       $asigna_m = '0';
     } else {
       $c_detallerec = remove_junk($db->escape($_POST['detalle_rec']));
     }
  
     	   
	 $query  = "INSERT INTO inv_reclamo (num_cuenta,fecha_rec,nombres_rec,apellidos_rec,motivo_rec, detalle_rec, solucion_rec) VALUES ('{$c_numcuenta}','{$c_fecharec}','{$c_nombresrec}','{$c_apellidosrec}','{$c_motivorec}', '{$c_detallerec}','{$c_solucionrec}')";
     
	   if($db->query($query)){
       $session->msg('s',"Reclamo agregado exitosamente. ");
       redirect('lis_reclamos.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('reg_reclamo.php', false);
     }
              

   } else{
       $session->msg("d", $errors);
       redirect('lis_reclamos.php',false);
   }

 }

?>
<?php //include_once('layouts/header.php'); ?>


<?php //include_once('layouts/footer.php'); ?>
