<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $servicio = find_by_id5('inv_servicio',(int)$_GET['id']);
  if(!$servicio){
    $session->msg("d","ID vacío");
    redirect('add_servicio.php');
  }

  $servicio_id = delete_by_id5('inv_servicio',(int)$servicio['cod_servicio']);
  if($servicio_id){
      $session->msg("s","Servicio eliminado");
	  redirect('add_servicio.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('add_servicio.php');
  }
?>
