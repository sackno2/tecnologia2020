<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $tuberia = find_by_id_tub('inv_tuberias',(int)$_GET['id']);
  
  if(!$tuberia){
    $session->msg("d","ID vacío");
    redirect('tuberia.php');
  }

  $tuberia_id = delete_by_id_tub('inv_tuberias',(int)$tuberia['cod_tuberia']);
  if($tuberia_id){
      $session->msg("s","Tuberia eliminada");
     	  
	   
	  redirect('tuberia.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('tuberia.php');
  }

    
  
?>
