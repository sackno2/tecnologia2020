<?php
  $page_title = 'Editar Servicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$servicio = find_by_id5('inv_servicio',(int)$_GET['id']);
//$all_categories = find_all('categories');
//$all_photo = find_all('media');


if(!$servicio){
  $session->msg("d","Servicio no encontrado por Codigo.",$medidor);
  redirect('add_servicio.php');
}
?>
<?php
 if(isset($_POST['edit_servicio'])){
   $req_fields = array('nom_servicio','valor_servicio');
   validate_fields($req_fields);
   if(empty($errors)){
     //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
     $c_nomservicio   = remove_junk($db->escape($_POST['nom_servicio']));
     if (is_null($_POST['valor_servicio']) || $_POST['valor_servicio'] === "") {
       $asigna_m = '0';
     } else {
       $c_valorservicio = remove_junk($db->escape($_POST['valor_servicio']));
     }
  
       $query1   = ("UPDATE inv_servicio SET nombre='$c_nomservicio', costo='$c_valorservicio' WHERE cod_servicio ='$servicio[cod_servicio]'"); 
      	    
       $result = $db->query($query1);
	   
	   
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Servicio ha sido actualizado. ");
                 redirect('add_servicio.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_servicio.php?id='.$servicio['cod_servicio'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_servicio.php?cod_medidor='.$servicio['cod_servicio'], false);
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
            <span>Editar Servicio</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_servicio.php?id=<?php echo remove_junk($servicio['cod_servicio']) ?>" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-3">
      <label for="cod_cliente">Código</label>
      <input type="text" name="cod_medidor" class="form-control" id="cod_medidor" value="<?php echo remove_junk($servicio['cod_servicio']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="nom_servicio">Nombre del servicio</label>
      <input type="text" name="nom_servicio" class="form-control" id="nom_servicio" value="<?php echo remove_junk($servicio['nombre']);?>" autofocus required>
    </div>
  <div class="form-group col-md-3">
    <label for="valor_servicio">Precio: <b>$</b></label>
    <input type="number" name="valor_servicio" step="0.01" min="0.01" class="form-control" value="<?php echo remove_junk($servicio['costo']);?>" autofocus required >  
  </div>     
  </div>
  
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="edit_servicio" id="submit" value="Guardar" class="btn btn-primary">
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
