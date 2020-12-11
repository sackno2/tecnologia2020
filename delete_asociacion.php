<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
    $asociacion = find_by_id_aso('asociacion',(int)$_GET['id']);
  
  
  if(!$asociacion){
    $session->msg("d","ID vacío");
    redirect('asociacion.php');
  }

  $asociacion_id = delete_by_id_as('asociacion',(int)$asociacion['cod_asociacion']);
  
  
  if($asociacion_id){
      $session->msg("s","Asociacion eliminada");
     
	  redirect('asociacion.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('asociacion.php');
  }
?>




  
  

  
  
      
