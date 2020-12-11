
<?php
  $page_title = 'Lecturas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$lec_cliente = find_by_cta('inv_cliente',(int)$_GET['num_cuenta']); 

$lectura_v = find_by_id_lec('lecturas',(int)$_GET['id']);



if(!$lectura_v){
  $session->msg("d","Lectura no encontrada por Codigo.",$lectura_v);
  redirect('list_val_lectura.php');
}
?><?php
function mes_letras($mes)
 {
    switch($mes) 
   {
      case "1":
         $month = "Enero";
         break;
      case "2":
         $month = "Febrero";
         break;
      case "3":
         $month = "Marzo";
         break;
      case "4":
         $month = "Abril";
         break;
      case "5":
         $month = "Mayo";
         break;
      case "6":
         $month = "Junio";
         break;
      case "7":
         $month = "Julio";
         break;
      case "8":
         $month = "Agosto";
         break;
      case "9":
         $month = "Septiembre";
         break;
      case "10":
         $month = "Octubre";
         break;
      case "11":
         $month = "Noviembre";
         break;
      case "12":
         $month = "Diciembre";
         break;
   }
   
   return $month;
}

?>



<?php
 if(isset($_POST['val_lectura_ind'])){
     //nombre dentro de post
    $req_fields = array('num_cuenta','mes_n','anio_v','lect_ant_v','lect_act_v','user_v');
    validate_fields($req_fields);

   if(empty($errors)){
     $vl_num_cta   = remove_junk($db->escape($_POST['num_cuenta']));
     $vl_mes  = remove_junk($db->escape($_POST['mes_n']));
     $vl_anio  = remove_junk($db->escape($_POST['anio_v']));
     //$vl_fehc_lect   = remove_junk($db->escape($_POST['fecha_lectura_v']));
     $vl_lect_ant   = remove_junk($db->escape($_POST['lect_ant_v']));
     $vl_lect_act   = remove_junk($db->escape($_POST['lect_act_v']));
    // $vl_consumo  = remove_junk($db->escape($_POST['consumo_v']));
     $vl_user  = remove_junk($db->escape($_POST['user_v']));
    // $vl_cobro  = remove_junk($db->escape($_POST['cobro_v']));
     
     
     $vl_consumo = ($_POST['lect_act_v'])-($_POST['lect_ant_v']);
        
        if (($_POST['lect_ant_v'])>($_POST['lect_act_v'])) {
            $vl_cobro = 'v';
            } else {
              $vl_cobro = 'c';
              }
       
     $query   = "UPDATE lecturas SET";
     $query  .=" num_cuenta='{$vl_num_cta}', mes='{$vl_mes}', anio='{$vl_anio}',";
     $query  .=" lectura_anterior= '{$vl_lect_ant}', lectura_actual='{$vl_lect_act}', consumo='{$vl_consumo}',";
     $query  .=" user='{$vl_user}',  cobro='{$vl_cobro}'";
     $query  .=" WHERE cod_lectura ='{$lectura_v['cod_lectura']}'";
              
     $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Lectura validada correctamente. ");
                 redirect('list_val_lectura.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('val_lectura_ind.php?id='.$lectura_v['cod_lectura'], false);
               }
       
   } else{
       $session->msg("d", $errors);
       redirect('val_lectura_ind.php?cod_lectura='.$lectura_v['cod_lectura'], false);
   }

 }
?>



<?php /*
			$id1 = $_GET['id'];
			$query2 = "SELECT cliente.nombre,cliente.apellido,cuenta.cod_cuenta,cuenta.num_cuenta,cuenta.cod_zona,cuenta.cod_sector,cuenta.cod_bloque,lectura.cod_lectura,lectura.cod_cuenta,lectura.lectura_anterior,lectura.lectura_actual,lectura.consumo,lectura.mes,lectura.anio FROM cliente,cuenta,lectura WHERE (cuenta.cod_cliente=cliente.cod_cliente) AND (cuenta.cod_cuenta=lectura.cod_cuenta) AND lectura.cod_lectura='$id1' AND consumo<=0 ORDER BY lectura.mes,cuenta.cod_zona,cuenta.cod_sector,cuenta.cod_bloque ASC";
			$result = mysqli_query($server, $query2);//almacena la consulta
			
			if($row = mysqli_fetch_array($result))
			{
			$apellido = $row['apellido'];
			
			}*/
			?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>VALIDACION LECTURA</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
 
 <form method="post" action="val_lectura_ind.php?id=<?php echo remove_junk($lectura_v['cod_lectura']) ?>" class="clearfix">    
 
 <div class="form-row">
 	<div class="form-group col-md-2">
      <label for="cod_lectura">Código de lectura</label>
      <input type="text" name="cod_lectura" class="form-control" id="num_cuenta" value="<?php echo remove_junk($lectura_v['cod_lectura']);?>" readonly>
    </div>
     
     
 	<div class="form-group col-md-2">
      <label for="num_cuenta">Código de cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($lectura_v['num_cuenta']);?>" readonly>
    </div>
         
     <div class="form-group col-md-3">
    <label for="nombres_rec">Nombres</label>
    <input type="text" name="nombres_rec" class="form-control"  value="<?php echo remove_junk($lec_cliente['nombre']);?>" readonly >  
  </div>  
  
  <div class="form-group col-md-3">
      <label for="apellidos_rec">Apellidos</label>
      <input type="text" name="apellidos_rec" class="form-control" id="apellido_rec" value="<?php echo remove_junk($lec_cliente['apellido']);?>"  readonly>
    </div>
     
     <div class="form-group col-md-2">
      <label for="user_v">Usuario</label>
     <?php  if ($session->isUserLoggedIn(true)); ?>  
     <input type="user_v" name="user_v" class="form-control" id="user_lect" value="<?php echo remove_junk(ucfirst($user['name']));?>" readonly>
   
        
  </div>
     
   </div>
       
  <div class="form-row"> 
  
  </div>
     
   <div class="form-row">
       <div class="form-group col-md-3">
      <label for="mes_l">Mes</label>
      <?php $mesletra = mes_letras($lectura_v['mes']);           
              ?>
      <input type="text" name="mes_l" class="form-control" value="<?php echo remove_junk($mesletra);?>" readonly >  
      <input type="hidden" name="mes_n" class="form-control" value="<?php echo remove_junk($lectura_v['mes']);?>" readonly >  
    </div>
  

    <div class="form-group col-md-3">
        <label for="anio_v">Año </label>
        <input type="number" name="anio_v" class="form-control" min="0" value="<?php echo remove_junk($lectura_v['anio']);?>"readonly >  
      </div>
     
       
       
       
 	<div class="form-group col-md-3">
    <label for="lect_ant_v">Lectura anterior</label>
    <input type="number" name="lect_ant_v" class="form-control" min="0" value="<?php echo remove_junk($lectura_v['lectura_anterior']);?>" readonly >  
  </div>  
  
  <div class="form-group col-md-3">
    <label for="lect_act_v">Lectura actual</label>
    <input type="number" name="lect_act_v" class="form-control" min="1" >  
  </div>  
 
 </div>
 
  
 
  <div class="row">
            <div class="form-group col-md-6" align="left">
      <input type="submit" name="val_lectura_ind" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="right">
                <a href="list_val_lectura.php" class="btn btn-primary">Regresar</a>
          
            </div>
  </div>

 </form> 
 
<!--Hasta aqui el formulario -->
         </div>
        </div>
      </div>
  </div>



<?php include_once('layouts/footer.php'); ?>
         
 
 
 
 
 
 
 