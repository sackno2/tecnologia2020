<?php
  $page_title = 'Agregar Jerarquia de tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $jerarquia = join_jerarquia_tuberia_table();
?>
<?php
//  echo $_POST['add_jerarquia'];
 if(isset($_POST['add_jerarquia_tub'])){
   $req_fields = array('jerarquia_tub');
   validate_fields($req_fields);
   if(empty($errors)){
     //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
       
     $j_jerarquia  = remove_junk($db->escape($_POST['jerarquia_tub']));
     
     $query  = "INSERT INTO jerarquia_tuberia (jerarquia) VALUES ('{$j_jerarquia}')";
     $query .=" ON DUPLICATE KEY UPDATE jerarquia='{$j_jerarquia}'";

   
     
     
     if($db->query($query)){
       $session->msg('s',"Jerarquia de tuberia agregada exitosamente. ");
       redirect('add_jerarquia_tub.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_jerarquia_tub.phpp', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_jerarquia_tub.php',false);
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
            <span>Jerarquia de tuberia</span>
         </strong>
        </div>
          
          
        <div class="panel-body">
         
<!--Inicio formulario principal-->       
   <form method="post" action="add_jerarquia_tub.php" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group">
      <label for="cod_jerarquia">Código Jerarquia</label>
      <input type="text" name="cod_jerarquia" class="form-control" id="cod_jerarquia" readonly>
    </div>
    <div class="form-group">
      <label for="jerarquia_tub">Jerarquia</label>
      <input type="text" name="jerarquia_tub" class="form-control" id="jerarquia_tub" maxlength="25" autofocus required>
    </div>
    
    </div>
  
  <div class="row">
      
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="add_jerarquia_tub" id="submit" value="Guardar" class="btn btn-primary">
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