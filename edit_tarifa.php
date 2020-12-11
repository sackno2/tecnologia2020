<?php
  $page_title = 'Editar Tarifa';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$tarifa = find_by_id6('inv_tarifa',(int)$_GET['id']);
//$all_categories = find_all('categories');
//$all_photo = find_all('media');


if(!$tarifa){
  $session->msg("d","Tarifa no encontrado por Codigo.",$tarifa);
  redirect('add_tarifa.php');
}
?>
<?php
 if(isset($_POST['edit_tarifa'])){
   $req_fields = array('nivel_tarifa','valor_tarifa','desde_tarifa','hasta_tarifa');
   validate_fields($req_fields);
   if(empty($errors)){
     $c_niveltarifa  = remove_junk($db->escape($_POST['nivel_tarifa']));
     $c_valortarifa   = remove_junk($db->escape($_POST['valor_tarifa']));
	 $c_desdetarifa   = remove_junk($db->escape($_POST['desde_tarifa']));
     if (is_null($_POST['hasta_tarifa']) || $_POST['hasta_tarifa'] === "") {
       $asigna_m = '0';
     } else {
       $c_hastatarifa = remove_junk($db->escape($_POST['hasta_tarifa']));
     }
  
       $query1   = ("UPDATE inv_tarifa SET nivel='$c_niveltarifa', inicio='$c_desdetarifa', final='$c_hastatarifa', precio='$c_valortarifa' WHERE cod_tarifa ='$tarifa[cod_tarifa]'"); 
      	    
       $result = $db->query($query1);
	   
	   
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Tarifa ha sido actualizada. ");
                 redirect('add_tarifa.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_tarifa.php?id='.$tarifa['cod_tarifa'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_tarifa.php?cod_medidor='.$tarifa['cod_tarifa'], false);
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
            <span>Editar Tarifa</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_tarifa.php?id=<?php echo remove_junk($tarifa['cod_tarifa']) ?>" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="nivel_tarifa">Nivel consumo</label>
      <input type="text" name="nivel_tarifa" class="form-control" id="nivel_tarifa" value="<?php echo remove_junk($tarifa['nivel']);?>" required>
    </div>
    <div class="form-group col-md-5">
      <label for="valor_tarifa">Costo:<b>$</b></label>
      <input type="number" step="0.01" min="0.01" name="valor_tarifa" class="form-control" id="valor_tarifa" value="<?php echo remove_junk($tarifa['precio']);?>" autofocus required>
    </div>
    </div>
   <div class="form-row"> 
  <div class="form-group col-md-4">
    <label for="desde_tarifa">Desde:</label>
    <input type="number" name="desde_tarifa" class="form-control" value="<?php echo remove_junk($tarifa['inicio']);?>" autofocus required >  
  </div>     
 
  <div class="form-group col-md-4">
    <label for="hasta_tarifa">Hasta:</label>
    <input type="number" name="hasta_tarifa" class="form-control" value="<?php echo remove_junk($tarifa['final']);?>" autofocus required >  
  </div>    
  <div class="form-group col-md-4" align="center">
     <div class="row padding-top">
      <input type="submit" name="edit_tarifa" id="submit" value="Guardar" class="btn btn-primary">
     </div>
    </div>     
  </div>
 </form> 
<!--Hasta aqui el formulario -->
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
