<?php
 require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   //variable GET
   $cod_serv=$_GET['cod_servicio'];
 
 //elimina el registro de la tabla empleados
 $query_serv="DELETE FROM recibo_linea_tmp WHERE cod_servicio=$cod_servicio";
 $result_serv= $db->query($query_serv);
 
  include('consulta_otro_rec.php');
?>