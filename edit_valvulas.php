<?php
  $page_title = 'Editar Válvula';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$valvula = find_by_id7('inv_valvula',(int)$_GET['id']); 
//$all_categories = find_all('categories');
//$all_photo = find_all('media');
if(!$valvula){
  $session->msg("d","Válvula no encontrada por Código.",$valvula);
  redirect('valvula.php');
}
?>

<?php 
 if(isset($_POST['reg_valvula'])){
   $req_fields = array('val_inventario','val_marca','val_tipo','val_instalacion', 'val_estado','val_lugar','val_mantto','val_realizado','val_observacion');
   validate_fields($req_fields);
   if(empty($errors)){
     
     $c_valinventario   = remove_junk($db->escape($_POST['val_inventario']));
     $c_valmarca   = remove_junk($db->escape($_POST['val_marca']));
     $c_valtipo   = remove_junk($db->escape($_POST['val_tipo']));
     $c_valinstalacion  = remove_junk($db->escape($_POST['val_instalacion']));
     $c_valestado  = remove_junk($db->escape($_POST['val_estado']));
	 $c_vallugar  = remove_junk($db->escape($_POST['val_lugar']));
	 $c_valobservacion  = remove_junk($db->escape($_POST['val_observacion']));
	 $c_valrealizado  = remove_junk($db->escape($_POST['val_realizado']));
     if (is_null($_POST['val_mantto']) || $_POST['val_mantto'] === "") {
       $asigna_m = '0';
     } else {
       $c_valmantto = remove_junk($db->escape($_POST['val_mantto']));
       if ($c_valrealizado=="NO"){

          $c_mantto=date("Y-m-d",strtotime($c_valmantto));

       }else{

          $c_mantto=date("Y-m-d",strtotime($c_valmantto."+ 3 month"));
       }
	   
     }
  
     	   
	 $query=("UPDATE inv_valvula SET num_inventario='$c_valinventario', marca='$c_valmarca', tipo='$c_valtipo', instalacion='$c_valinstalacion', estado='$c_valestado', lugar='$c_vallugar', mantenimiento='$c_mantto' WHERE cod_valvula='$valvula[cod_valvula]'");
	 
     $result = $db->query($query);
	 
	 $query2  = "INSERT INTO inv_manttoval(num_inventario, fecha_mantto, ejecutado,observaciones) VALUES ('{$c_valinventario}','{$c_valmantto}','{$c_valrealizado}','{$c_valobservacion}')";
     $query2 .=" ON DUPLICATE KEY UPDATE num_inventario='{$c_valinventario}'";
	 $result2 = $db->query($query2);
	 
	 
	   if($result && $db->affected_rows() === 1){
       $session->msg('s',"Valvula editado exitosamente. ");
       redirect('valvula.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('edit_valvulas.php', false);
     }
              

   } else{
       $session->msg("d", $errors);
       redirect('valvula.php',false);
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
            <span>EDICIÓN Y REPORTE DE MANTTO. DE VÁLVULAS</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_valvulas.php?id=<?php echo remove_junk($valvula['cod_valvula']) ?>" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-2">
      <label for="val_inventario">Inventario</label>
      <input type="text" name="val_inventario" class="form-control" id="val_inventario" value="<?php echo remove_junk($valvula['num_inventario']);?>" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="val_marca">Marca</label>
      <select name="val_marca" class="form-control" id="val_marca" >
        <option selected><?php echo remove_junk($valvula['marca']);?></option>
        <option value="PRAHER">PRAHER</option>
        <option value="Mival">Mival</option>
        <option value="GEMU">GEMU</option>
        <option value="Festo Process">Festo Process</option>
        <option value="Antirretorno PRAHER">Antirretorno PRAHER</option>
        <option value="Antirretorno Mival">Antirretorno Mival</option>
        <option value="Retención PRAHER">Retención PRAHER</option>
        <option value="FESTO">FESTO</option>
        <option value="BEULCO">BEULCO</option>
        <option value="NIBCO">NIBCO</option>
        <option value="ACIPCO">ACIPCO</option>
        <option value="WATTS">WATTS</option>
      </select>
    </div>
  
  
  <div class="form-group col-md-6">
    <label for="val_tipo">tipo</label>
     <?php 
     // Consulta la tabla medidor para obtenerla lista del select
		$query_v = ("SELECT id,tipo FROM inv_tiposval ORDER BY id ASC");
		$result_v = $db->query($query_v);
	  ?>		
      <select name="val_tipo" class="form-control" id="val_tipo" required>
        <option selected><?php echo remove_junk($valvula['tipo']);?></option>
     <?php
		 while($row_v = mysqli_fetch_array($result_v))
		 {
		 printf("<option value='".$row_v['tipo']." '>".$row_v['tipo']."</option>");
		 }
		mysqli_free_result($result_m);
	 ?>   
      </select>     
  </div>  
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
   <label for="val_instalacion">Fecha. Instalación</label>
   <input type="date" name="val_instalacion" class="form-control" value="<?php echo remove_junk($valvula['instalacion']);?>" autofocus></input>  
    </div>  
  <div class="form-group col-md-4">
      <label for="val_estado">Estado</label>
      <input type="text" name="val_estado" class="form-control" id="val_estado" value="<?php echo remove_junk($valvula['estado']);?>" autofocus></input>
    </div>
    <div class="form-group col-md-4">
      <label for="val_lugar">Lugar</label>    
      <textarea class="form-control" rows="3" name="val_lugar" placeholder="Lugar....."><?php echo remove_junk($valvula['lugar']);?></textarea>	     
    </div>
 </div>
<div class="panel-body"> 
<table class="table table-bordered">
<thead>
<tr>
	<td class="text-center" style="width: 30%;">Fech. de Mantenimiento</td>
    <td class="text-center" style="width: 15%;">Ejecutado</td>
    <th class="text-center" style="width: 55%;">Observaciones</th>
</tr>
</thead>
<tbody>
<?php // Consulta la tabla medidor para obtenerla lista del select
		$query_v = ("SELECT * FROM inv_manttoval WHERE num_inventario='$valvula[num_inventario] '");
		$result_v = $db->query($query_v); ?>
<tr>
  <td class="text-center"><input type="date" class="form-control" name="val_mantto" value="<?php echo remove_junk($valvula['mantenimiento']);?>"></td>    
   
 <td class="text-center"><select name="val_realizado" id="val_realizado">
        <option value="NO" selected>NO</option>
        <option value="SI">SI</option>
      </select>	</td>  
   <td><input type="text" class="form-control" name="val_observacion" value="-----"> </td>      
</tr>
</tbody>
</table> 
</div>
 <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="reg_valvula" id="submit" value="Guardar" class="btn btn-primary">
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
