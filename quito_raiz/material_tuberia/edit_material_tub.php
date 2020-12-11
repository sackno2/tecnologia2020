<?php
  $page_title = 'Editar material de tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$material = find_by_id_mt('mat_tuberia',(int)$_GET['id']);

if(!$material){
  $session->msg("d","Material de tuberia no encontrada por Codigo.",$material);
  redirect('material_tub.php');
}
?>
<?php
 if(isset($_POST['edit_material_tub'])){
    $req_fields = array('material_tub');
    validate_fields($req_fields);

   if(empty($errors)){
       //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
     $m_material   = remove_junk($db->escape($_POST['material_tub']));
       $query   = "UPDATE mat_tuberia SET";
       $query  .=" material='{$m_material}'WHERE cod_material ='{$material['cod_material']}'";
	   
	   
	   	   
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Material de tuberia ha sido actualizado. ");
                 redirect('material_tub.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_material_tub.php?id='.$material['cod_material'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_material_tub.php?cod_material='.$material['cod_material'], false);
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
            <span>Editar Material de tuberia</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_material_tub.php?id=<?php echo remove_junk($material['cod_material']) ?>" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="cod_material">Código Material</label>
      <input type="text" name="cod_material" class="form-control" id="cod_material" value="<?php echo remove_junk($material['cod_material']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="material_tub">Material</label>
      <input type="text" name="material_tub" class="form-control" id="material_tub" maxlength="30" value="<?php echo remove_junk($material['material']);?>" autofocus required>
    </div>
   
  
  
  
  </div>
   
      
    
     
   
  
  
  <div class="row">
      
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="edit_material_tub" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-6" align="right">
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
