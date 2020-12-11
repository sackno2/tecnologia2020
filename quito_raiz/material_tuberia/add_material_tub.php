<?php
  $page_title = 'Agregar Material de tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
   $material = join_material_tuberia_table();

?>
<?php
//  echo $_POST['add_material'];
 if(isset($_POST['add_material_tub'])){
   $req_fields = array('material_tub');
   validate_fields($req_fields);
   if(empty($errors)){
     //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
       
     $m_material  = remove_junk($db->escape($_POST['material_tub']));
     
     $query  = "INSERT INTO mat_tuberia (material) VALUES ('{$m_material}')";
     $query .=" ON DUPLICATE KEY UPDATE material='{$m_material}'";

   
     
     
     if($db->query($query)){
       $session->msg('s',"Material de tuberia agregado exitosamente. ");
       redirect('add_material_tub.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_material_tub.phpp', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_material_tub.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Material de tuberia</span>
         </strong>
        </div>
          
          
        <div class="panel-body">
         
<!--Inicio formulario principal-->       
   <form method="post" action="add_material_tub.php" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group">
      <label for="cod_material">Código Material</label>
      <input type="text" name="cod_material" class="form-control" id="cod_material" readonly>
    </div>
    <div class="form-group">
      <label for="material_tub">Material</label>
      <input type="text" name="material_tub" class="form-control" id="material_tub" maxlength="30" autofocus required>
    </div>
    
    </div>
  
  <div class="row">
      
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="add_material_tub" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-6" align="right">
      <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
      
    </div>
  </div>
 </form>  
    
               
<!--Fin formulario principal-->
		
         
      </div>
  </div>
<?php include_once('layouts/footer.php'); ?>