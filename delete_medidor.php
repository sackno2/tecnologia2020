<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $medidor = find_by_id3('inv_medidor',(int)$_GET['id']);
  if(!$medidor){
    $session->msg("d","ID vacío");
    redirect('medidores.php');
  }

  $medidor_id = delete_by_id3('inv_medidor',(int)$medidor['cod_medidor']);
  if($medidor_id){
      $session->msg("s","Medidor eliminado");
	  redirect('medidores.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('medidores.php');
  }
?>
