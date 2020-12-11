<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $jerarquia = find_by_id_jt('jerarquia_tuberia',(int)$_GET['id']);
  
  if(!$jerarquia){
    $session->msg("d","ID vacío");
    redirect('jerarquia_tub.php');
  }

  $jerarquia_id = delete_by_id_jt('jerarquia_tuberia',(int)$jerarquia['cod_jerarquia']);
  if($jerarquia_id){
      $session->msg("s","Jerarquia de tuberia eliminada");
     	  
	   
	  redirect('jerarquia_tub.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('jerarquia_tub.php');
  }

    
  
?>

  
  
  
  
  ?>
