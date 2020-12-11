<?php
  $page_title = 'Agregar Válvular';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  //$all_categories = find_all('categories');
  //$all_photo = find_all('media');
  $valvulas = join_inv_valvula_table();
?>
<?php
  //echo $_POST['num_medidor'];
 if(isset($_POST['add_valvula'])){
   $req_fields = array('num_inventario','val_marca','val_tipo','val_instalacion','val_estado', 'val_lugar');
   validate_fields($req_fields);
   if(empty($errors)){
     $c_inventario  = remove_junk($db->escape($_POST['num_inventario']));
     $c_valmarca   = remove_junk($db->escape($_POST['val_marca']));
     $c_valtipo   = remove_junk($db->escape($_POST['val_tipo']));
     $c_valinstal   = remove_junk($db->escape($_POST['val_instalacion']));
	 $fecha_actual = date("Y-m-d");
     //sumo 3 meses
     $c_mantto=date("Y-m-d",strtotime($fecha_actual."+ 3 month"));
     $c_valestado  = remove_junk($db->escape($_POST['val_estado']));
     
     if (is_null($_POST['val_lugar']) || $_POST['val_lugar'] === "") {
       $asigna_m = '0';
     } else {
       $c_vallugar = remove_junk($db->escape($_POST['val_lugar']));
     }
     $date    = make_date();
     $query  = "INSERT INTO inv_valvula (num_inventario, marca,tipo,instalacion,mantenimiento,estado,lugar) VALUES ('{$c_inventario}','{$c_valmarca}','{$c_valtipo}','{$c_valinstal}','{$c_mantto}','{$c_valestado}', '{$c_vallugar}')";
     $query .=" ON DUPLICATE KEY UPDATE num_inventario='{$c_inventario}'";
	 
     if($db->query($query)){
       $session->msg('s',"Válvula agregada exitosamente. ");
       redirect('valvula.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('valvula.php', false);
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
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Válvula</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
<!--Inicio formulario principal-->       
   <form method="post" action="add_valvula.php" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-2">
      <label for="num_inventario">Num. de Inventario</label>
      <input type="text" name="num_inventario" class="form-control" id="num_inventario" placeholder="Inventario" autofocus required>
    </div>
    <div class="form-group col-md-4">
      <label for="val_marca">Marca</label>
      <select name="val_marca" class="form-control" id="val_marca" >
        <option>-------</option>
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
      <label for="val_tipo">Tipo</label>
     <?php 
     // Consulta la tabla medidor para obtenerla lista del select
		$query_v = ("SELECT tipo FROM inv_tiposval ORDER BY id ASC");
		$result_v = $db->query($query_v);
	  ?>		
      <select name="val_tipo" class="form-control" id="val_tipo" required>
        <option selected>-------</option>
     <?php
		 while($row_v = mysqli_fetch_array($result_v))
		 {
		 printf("<option value='".$row_v['tipo']." '>".$row_v['tipo']."</option>");
		 }
		mysqli_free_result($result_v);
	 ?>   
      </select>
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-4">
    <label for="val_instalacion">Fech. Instalación</label>
    <input type="date" name="val_instalacion" class="form-control" value="" placeholder="Fecha de instalación" autofocus required >  
  </div>  
  
  <div class="form-group col-md-4">
      <label for="val_estado">Estado</label>
      <input type="text" name="val_estado" class="form-control" id="val_estado" placeholder="Estado" autofocus required>
   </div>
 
<div class="form-group col-md-4">
      <label for="val_lugar">Lugar</label>
      <input type="text" name="val_lugar" class="form-control" id="val_lugar" placeholder="Estado" autofocus required>
   </div> 
   
</div>
  
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="add_valvula" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="right">
      <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
    </div>
  </div>
 </form>  
  </div>      
               
<!--Fin formulario principal-->		
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
