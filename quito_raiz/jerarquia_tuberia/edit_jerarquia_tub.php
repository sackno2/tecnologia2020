<?php
  $page_title = 'Editar jerarquia de tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$jerarquia = find_by_id_jt('jerarquia_tuberia',(int)$_GET['id']);


if(!$jerarquia){
  $session->msg("d","Jeraquia de tuberia no encontrada por Codigo.",$jerarquia);
  redirect('jerarquia_tub.php');
}
?>
<?php
 if(isset($_POST['edit_jerarquia_tub'])){
    $req_fields = array('jerarquia_tub');
    validate_fields($req_fields);

   if(empty($errors)){
       //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
     $j_jerarquia   = remove_junk($db->escape($_POST['jerarquia_tub']));
       $query   = "UPDATE jerarquia_tuberia SET";
       $query  .=" jerarquia='{$j_jerarquia}'WHERE cod_jerarquia ='{$jerarquia['cod_jerarquia']}'";
	   
	   
	   	   
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Jerarquia de tuberia ha sido actualizado. ");
                 redirect('jerarquia_tub.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_jerarquia_tub.php?id='.$jerarquia['cod_jerarquia'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_jerarquia_tub.php?cod_jerarquia='.$jerarquia['cod_jerarquia'], false);
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
            <span>Editar Jerarquia de tuberia</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_jerarquia_tub.php?id=<?php echo remove_junk($jerarquia['cod_jerarquia']) ?>" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="cod_jerarquia">Código Jerarquia</label>
      <input type="text" name="cod_jerarquia" class="form-control" id="cod_jerarquia"  value="<?php echo remove_junk($jerarquia['cod_jerarquia']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="jerarquia_tub">Jerarquia</label>
      <input type="text" name="jerarquia_tub" class="form-control" id="jerarquia_tub" maxlength="25" value="<?php echo remove_junk($jerarquia['jerarquia']);?>" autofocus required>
    </div>
  </div>
   
  
  <div class="row">
      
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="edit_jerarquia_tub" id="submit" value="Guardar" class="btn btn-primary">
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
