<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $medidor = find_by_id4('inv_reclamo',(int)$_GET['id']);
  if(!$medidor){
    $session->msg("d","ID vacío");
    redirect('lis_reclamos.php');
  }

  $medidor_id = delete_by_id4('inv_reclamos',(int)$medidor['cod_reclamo']);
  if($medidor_id){
      $session->msg("s","Reclamo eliminado");
	  redirect('lis_reclamos.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('lis_reclamos.php');
  }
?>
