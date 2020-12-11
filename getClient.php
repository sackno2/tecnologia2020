<?php

  require_once('includes/load.php');
  
  page_require_level(2);
if(isset($_GET['getClientId'])){  
    $cuenta = "select * from inv_cliente where num_cuenta='".$_GET['getClientId']."'" or die(mysqli_error());
    $result_cuenta= $db->query($cuenta);
    
  
  
  if($row = mysqli_fetch_array($result_cuenta)){
    echo "formObj.nombre.value = '".$row["nombre"]."';\n";    
   echo "formObj.apellido.value = '".$row["apellido"]."';\n";      
	
   
  }else{
    echo "formObj.nombre.value = '';\n";    
    echo "formObj.apellido.value = '';\n";    
        
  }    
}
?>