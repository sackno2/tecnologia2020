<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $cliente = find_by_id2('inv_cliente',(int)$_GET['id']);
  $medidor = $_GET['medidor'];
  if(!$cliente){
    $session->msg("d","ID vacío");
    redirect('cliente.php');
  }

  $cliente_id = delete_by_id2('inv_cliente',(int)$cliente['cod_cliente']);
  if($cliente_id){
      $session->msg("s","Producto eliminado");
     // $query1 = "SELECT cod_cliente,num_medidor FROM inv_cliente WHERE cod_cliente = '$cliente[cod_cliente]'";
	  //$result1 = $db->query($query1);
	  
	  
	  //echo $medidor;
	 // sleep(2);
	 // exit;
	  
	  $actualiza3="UPDATE inv_medidor SET asignado='NO' WHERE  numero='$medidor'";
	  $result2 =$db->query($actualiza3); 
	  redirect('cliente.php');
	  
  } else {
      $session->msg("d","Eliminación falló");
      redirect('cliente.php');
  }
?>
