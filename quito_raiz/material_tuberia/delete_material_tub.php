<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $material = find_by_id_mt('mat_tuberia',(int)$_GET['id']);
  
  if(!$material){
    $session->msg("d","ID vacío");
    redirect('material_tub.php');
  }

  $material_id = delete_by_id_mt('mat_tuberia',(int)$material['cod_material']);
  if($material_id){
      $session->msg("s","Material de tuberia eliminado");
     	  
	   
	  redirect('material_tub.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('material_tub.php');
  }

  
  
  
  ?>
