<?php
  $page_title = 'Editar Reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$rec_reclamo = find_by_id4('inv_reclamo',(int)$_GET['id']); 
//$all_categories = find_all('categories');
//$all_photo = find_all('media');
if(!$rec_reclamo){
  $session->msg("d","Reclamo no encontrado por Codigo.",$rec_reclamo);
  redirect('lis_reclamos.php');
}
?>

<?php 
 if(isset($_POST['reg_reclamo'])){
   $req_fields = array('num_cuenta','fecha_rec','nombres_rec','apellidos_rec', 'motivo_rec','solucion_rec','detalle_rec');
   validate_fields($req_fields);
   if(empty($errors)){
     
     $c_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
     $c_fecharec   = remove_junk($db->escape($_POST['fecha_rec']));
     $c_nombresrec   = remove_junk($db->escape($_POST['nombres_rec']));
     $c_apellidosrec  = remove_junk($db->escape($_POST['apellidos_rec']));
     $c_motivorec  = remove_junk($db->escape($_POST['motivo_rec']));
	 $c_solucionrec  = remove_junk($db->escape($_POST['solucion_rec']));
     if (is_null($_POST['detalle_rec']) || $_POST['detalle_rec'] === "") {
       $asigna_m = '0';
     } else {
       $c_detallerec = remove_junk($db->escape($_POST['detalle_rec']));
     }
  
     	   
	 $query=("UPDATE inv_reclamo SET num_cuenta='$c_numcuenta', fecha_rec='$c_fecharec', nombres_rec='$c_nombresrec', apellidos_rec='$c_apellidosrec', motivo_rec='$c_motivorec', detalle_rec='$c_detallerec', solucion_rec='$c_solucionrec' WHERE cod_reclamo='$rec_reclamo[cod_reclamo]'");
	 
     $result = $db->query($query);
	 
	   if($result && $db->affected_rows() === 1){
       $session->msg('s',"Reclamo editado exitosamente. ");
       redirect('lis_reclamos.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('edit_reclamo.php', false);
     }
              

   } else{
       $session->msg("d", $errors);
       redirect('lis_reclamos.php',false);
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
            <span>EDITAR RECLAMO</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_reclamo.php?id=<?php echo remove_junk($rec_reclamo['cod_reclamo']) ?>" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="num_cuenta">Código de cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($rec_reclamo['num_cuenta']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="fecha_rec">Fecha solución</label>
      <input type="date" name="fecha_rec" class="form-control" id="fecha_rec" placeholder="dd/mm/aaaa" autofocus >
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="nombres_rec">Nombres</label>
    <input type="text" name="nombres_rec" class="form-control" placeholder="nombres_rec" value="<?php echo remove_junk($rec_reclamo['nombres_rec']);?>" autofocus required >  
  </div>  
  
  <div class="form-group col-md-6">
      <label for="apellidos_rec">Apellidos</label>
      <input type="text" name="apellidos_rec" class="form-control" id="apellido_rec" value="<?php echo remove_junk($rec_reclamo['apellidos_rec']);?>" autofocus required>
    </div>
 
  </div>
   <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="motivo_rec">Motivo</label>
      <select id="motivo_rec" name="motivo_rec" class="form-control">
        <option selected><?php echo remove_junk($rec_reclamo['motivo_rec']);?></option>
        <option value="Factura atrazada">Factura atrazada</option>
        <option value="Medidor averiado">Medidor averiado</option>
        <option value="Cobro excesivo">Cobro excesivo</option>
        <option value="Quejas">Quejas</option>
        <option value="Daños">Daños</option>
        <option value="Robos">Robos</option>
        <option value="Abandono">Abandono</option>
        <option value="Otros">Otros</option>
      </select>
    </div>
  

    <div class="form-group col-md-6">
      <label for="asignado_medidor">Detalles</label>
      <textarea class="form-control" rows="3" name="detalle_rec" placeholder="Detalles....."><?php echo remove_junk($rec_reclamo['detalle_rec']);?></textarea>	     
    </div>
 </div>
 
  <div class="form-group col-md-12">
      <label for="solucion_rec">SOLUCIONADO</label>
      <select name="solucion_rec" id="solucion_rec">
        <option value="NO" selected>NO</option>
        <option value="SI">SI</option>
      </select>	     
  </div>
 
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="reg_reclamo" id="submit" value="Guardar" class="btn btn-primary">
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
