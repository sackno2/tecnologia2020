<?php
  $page_title = 'Reconectar cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$cliente = find_by_id2('inv_cliente',(int)$_GET['id']);
//$all_categories = find_all('categories');
//$all_photo = find_all('media');
if(!$cliente){
  $session->msg("d","Cliente no encontrado por Codigo.",$cliente['cod_cliente']);
  redirect('lis_reconexion.php');
}
?>
<?php
 if(isset($_POST['reconexion'])){
    $req_fields = array('cod_cliente','num_cuenta','fecha_orden','nombres_cli', 'apellidos_cli','fech_ejecuta','num_medidor','lect_inicial','ejecutado','observacion');
    validate_fields($req_fields);

   if(empty($errors)){
       //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
	 $c_codcliente   = remove_junk($db->escape($_POST['cod_cliente']));   
	 $c_numcuenta    = remove_junk($db->escape($_POST['num_cuenta']));  
     $c_fechaorden   = remove_junk($db->escape($_POST['fecha_orden']));
     $c_nombrescli   = remove_junk($db->escape($_POST['nombres_cli']));
     $c_apellidoscli = remove_junk($db->escape($_POST['apellidos_cli']));
     $c_fechaejecuta = remove_junk($db->escape($_POST['fech_ejecuta']));
     $c_nummedidor   = remove_junk($db->escape($_POST['num_medidor']));
     $c_lectinicial  = remove_junk($db->escape($_POST['lect_inicial']));
     $c_ejecutado   = remove_junk($db->escape($_POST['ejecutado']));
    
     if (is_null($_POST['observacion']) || $_POST['observacion'] === "") {
       $c_observacion = '0';
       } else {
        $c_observacion = remove_junk($db->escape($_POST['observacion']));
       }
//Query actualiza tabla inv_cliente activando nuevamente	     
       $query   = "UPDATE inv_cliente SET nombre='{$c_nombrescli}', apellido='{$c_apellidoscli}', num_medidor='{$c_nummedidor}', lectura_ini='{$c_lectinicial}', estado='2' WHERE cod_cliente ='{$cliente['cod_cliente']}'";
	   $result = $db->query($query);
       if($result && $db->affected_rows() === 1){
           $session->msg('s',"Cliente ha sido reconectado. ");
           redirect('lis_reconexion.php', false);
        } else {
            $session->msg('d',' Lo siento, recoenxión falló.');
            redirect('edit_cliente2.php?id='.$cliente['cod_cliente'], false);
              }	   
//Fin query
//Query inserta en tabla inv_reconexion	   
	 $query4  = "INSERT INTO inv_reconexion (cod_cuenta, fecha_orden, fecha_ejecucion, ejecutada, observacion) VALUES ('{$c_numcuenta}', '{$c_fechaorden}', '{$c_fechaejecuta}', '{$c_ejecutado}', '{$c_observacion}') ON DUPLICATE KEY UPDATE cod_cuenta='{$c_numcuenta}'";
	 $result4=$db->query($query4);
//Fin query	 
//Query Elimina cuenta inv_desconexion
	$sql3 ="DELETE FROM inv_desconexion WHERE cod_cuenta='{$c_numcuenta}' LIMIT 1"; 
    $result3=$db->query($sql3);
//Fin query	   
	   $actualiza=("UPDATE inv_medidor SET asignado='SI' WHERE cod_medidor='$c_nummedi'");
	   $result1 =$db->query($actualiza);
	   
	   
	  
		if($c_nummedi <> $cliente['num_medidor'])
		{ 
		
		$actualiza2=("UPDATE inv_medidor SET asignado='NO' WHERE cod_medidor='$cliente[num_medidor]'");
	    $result2 =$db->query($actualiza2);  
		   
		}
	  
	   
       

   } else{
       $session->msg("d", $errors);
       redirect('edit_cliente2.php?cod_cliente='.$cliente['cod_cliente'], false);
   }

 }

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
            <span>Reconexión de Cliente</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_cliente2.php?id=<?php echo remove_junk($cliente['cod_cliente']); ?>" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="cod_cliente">Código Cliente</label>
      <input type="text" name="cod_cliente" class="form-control" id="cod_cliente" value="<?php echo remove_junk($cliente['cod_cliente']);?>" autofocus readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="num_cuenta">No. Cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($cliente['num_cuenta']);?>" autofocus readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="fecha_orden">Fecha de Orden</label>
      <input type="date" name="fech_orden" class="form-control" id="fecha_naci" value="" autofocus required>
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="nombres_cli">Nombres</label>
    <input type="text" name="nombres_cli" class="form-control" placeholder="Nombres" value="<?php echo remove_junk($cliente['nombre']);?>" autofocus required >  
  </div>  
  
  <div class="form-group col-md-6">
      <label for="apellidos_cli">Apellidos</label>
      <input type="text" name="apellidos_cli" class="form-control" id="apellidos_cli" value="<?php echo remove_junk($cliente['apellido']);?>" placeholder="Apellidos" autofocus required>
    </div>
  </div>  
    
  <div class="form-row">  
  <div class="form-group col-md-4">
      <label for="fecha_ejecuta">Fecha de ejecución</label>
      <input type="date" name="fech_ejecuta" class="form-control" id="fecha_ejecuta" value="" autofocus required>
  </div>
  
    <div class="form-group col-md-4">
     <?php
		// Consulta la tabla medidor para obtenerla lista del select
		
		$query_m = ("SELECT * FROM inv_medidor WHERE asignado='NO' ORDER BY cod_medidor ASC");
		$result_m = $db->query($query_m);
		
	  ?>	
      <label for="num_medidor">Medidor</label>
      <select id="num_medidor" name="num_medidor" class="form-control" >
      
		 
        <option value="<?php echo remove_junk($cliente['num_medidor']); ?>" selected><?php echo remove_junk($cliente['num_medidor']); ?></option>
		<?php while($row_m = mysqli_fetch_array($result_m)) 
			{ ?>
           
        <option value="<?php echo $row_m['cod_medidor']; ?>"><?php echo $row_m['cod_medidor']; ?></option>
                 
           <?php }; 
		mysqli_free_result($result_m);
		?>      
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="lec_inicial">Lectura inicial</label>
      <input type="text" name="lect_inicial" class="form-control" id="lect_inicial" value="<?php echo remove_junk($cliente['lectura_ini']); ?>">
    </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="ejecutado">EJECUTADO</label>
      <select name="ejecutado" id="ejecutado">
        <option value="NO" selected>NO</option>
        <option value="SI">SI</option>
      </select>	     
  </div>
    <div class="form-group col-md-6">
      <label for="observacion">Observación</label>
      <textarea class="form-control" rows="3" name="observacion" placeholder="Detalles....."></textarea>	     
    </div>   
  </div>
  <div class="form-row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="reconexion" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="right">
      <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
    </div>
  </div>
 </form>  
      
<!--Hasta aqui el formulario -->
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
