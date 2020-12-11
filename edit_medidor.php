<?php
  $page_title = 'Editar Medidor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$medidor = find_by_id3('inv_medidor',(int)$_GET['id']);
//$all_categories = find_all('categories');
//$all_photo = find_all('media');


if(!$medidor){
  $session->msg("d","Medidor no encontrado por Codigo.",$medidor);
  redirect('medidores.php');
}
?>
<?php
 if(isset($_POST['edit_medidor'])){
   $req_fields = array('num_medidor','fecha_actual','cod_marca','serie_medidor', 'estado_medidor','asignado_medidor');
   validate_fields($req_fields);
   if(empty($errors)){
     //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
     $c_nummedidor   = remove_junk($db->escape($_POST['num_medidor']));
     $c_fechactual   = remove_junk($db->escape($_POST['fecha_actual']));
     $c_codmarca   = remove_junk($db->escape($_POST['cod_marca']));
     $c_smedidor  = remove_junk($db->escape($_POST['serie_medidor']));
     $c_estadomedi  = remove_junk($db->escape($_POST['estado_medidor']));
     if (is_null($_POST['asignado_medidor']) || $_POST['asignado_medidor'] === "") {
       $asigna_m = '0';
     } else {
       $c_asigmedi = remove_junk($db->escape($_POST['asignado_medidor']));
     }
  
       $query1   = ("UPDATE inv_medidor SET numero='$c_nummedidor', fecha_crea='$c_fechactual', cod_marca='$c_codmarca',serie='$c_smedidor', estado='$c_estadomedi', asignado='$c_asigmedi' WHERE cod_medidor ='$medidor[cod_medidor]'"); 
      	    
       $result = $db->query($query1);
	   
	   
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Medidor ha sido actualizado. ");
                 redirect('medidores.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_medidor.php?id='.$medidor['cod_medidor'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_medidor.php?cod_medidor='.$medidor['cod_medidor'], false);
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
            <span>Editar Medidor</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_medidor.php?id=<?php echo remove_junk($medidor['cod_medidor']) ?>" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="cod_cliente">Código</label>
      <input type="text" name="cod_medidor" class="form-control" id="cod_medidor" value="<?php echo remove_junk($medidor['cod_medidor']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="num_medidor">Numero</label>
      <input type="text" name="num_medidor" class="form-control" id="num_medidor" value="<?php echo remove_junk($medidor['numero']);?>" autofocus required>
    </div>
    <div class="form-group col-md-2">
      <label for="fecha_actual">Fecha</label>
      <input type="text" name="fecha_actual" value="<?php echo remove_junk($medidor['fecha_crea']);?>" class="form-control" id="fecha_actual" autofocus readonly>
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="cod_marca">Codigo de marca</label>
    <input type="text" name="cod_marca" class="form-control" placeholder="cod_marca" value="<?php echo remove_junk($medidor['cod_marca']);?>" autofocus required >  
  </div>  
  
  <div class="form-group col-md-6">
      <label for="serie_medidor">Serie</label>
      <input type="text" name="serie_medidor" class="form-control" id="serie_medidor" value="<?php echo remove_junk($medidor['serie']);?>" placeholder="Serie" autofocus required>
    </div>
 
  </div>
   <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="estado_medidor">Estado</label>
      <select id="estado_medidor" name="estado_medidor" class="form-control">
        <option value="<?php echo remove_junk($medidor['estado']); ?>" selected><?php echo remove_junk($medidor['estado']); ?></option>
        <option value="Nuevo">Nuevo</option>
        <option value="Usado">Usado</option>
        <option value="averiado">Averiado</option>
      </select>
    </div>
  

    <div class="form-group col-md-6">
      <label for="asignado_medidor">Asignado</label>
      	
      <select id="asignado_medidor" name="asignado_medidor" class="form-control" required>
        <option value="NO"selected>NO</option>
        <option value="SI">SI</option>
      </select>
    </div>
 </div>
 
<!--  <div class="row">
  <div class="form-group">
   <label for="ubicaGeo">Ubicacion Geografica</label>
  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4">
      <label for="latitud_cli">Latitud * (Ej. 13.xxxxxx")</label>
      <input type="text" name="latitud_cli" class="form-control" id="latitud_cli" placeholder="Ej. 13.xxxxxx" value="0">
    </div>
    <div class="form-group col-md-4">
      <label for="longitud_cli">Longitud * (Ej. -88.xxxxxx)</label>
      <input type="text" name="longitud_cli" class="form-control" id="longitud_cli" placeholder="Ej. -88.xxxxxx" value="0">
    </div>
    <div class="form-group col-md-4">
      <label for="altura_cli">Altura * (Ej. 110 msnm)</label>
       <input type="text" name="altura_cli" class="form-control" id="altura_cli" placeholder="Ej. 110" value="0">
    </div>
  </div>
<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>-->
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="edit_medidor" id="submit" value="Guardar" class="btn btn-primary">
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
