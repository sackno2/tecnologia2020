<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $tarifa = find_by_id6('inv_tarifa',(int)$_GET['id']);
  if(!$tarifa){
    $session->msg("d","ID vacío");
    redirect('add_tarifa.php');
  }

  $tarifa_id = delete_by_id6('inv_tarifa',(int)$tarifa['cod_tarifa']);
  if($tarifa_id){
      $session->msg("s","Tarifa eliminada");
	  redirect('add_tarifa.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('add_tarifa.php');
  }
?>
