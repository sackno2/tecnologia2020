<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $desconexion = find_by_id8('inv_desconexion',(int)$_GET['id']);
  if(!$desconexion){
    $session->msg("d","ID vacío");
    redirect('lis_desconexion.php');
  }

  $desconexion_id = delete_by_id7('inv_desconexion',(int)$desconexion['cod_orden_desco']);
  if($desconexion_id){
      $session->msg("s","Reclamo eliminado");
	  redirect('lis_desconexion.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('lis_desconexion.php');
  }
?>
