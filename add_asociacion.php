<?php
  $page_title = 'Agregar Asociacion';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  
  $asociaciones = join_asociacion_table();
?>
<?php
 
 if(isset($_POST['add_asociacion'])){
   $req_fields = array('asoc_nombre','asoc_abrev', 'asoc_nit','asoc_tel','asoc_dir','cod_departamento','cod_municipio','asoc_cel','asoc_rep','asoc_dui_rep','asoc_nit_rep','asoc_prof_rep','asoc_rep_fn');
   validate_fields($req_fields);
   if(empty($errors)){
     //$a_codigo  = remove_junk($db->escape($_POST['asoc_codigo']));
     $a_nombre   = remove_junk($db->escape($_POST['asoc_nombre']));
     $a_abrev  = remove_junk($db->escape($_POST['asoc_abrev']));
     $a_nit  = remove_junk($db->escape($_POST['asoc_nit']));
     $a_telefono   = remove_junk($db->escape($_POST['asoc_tel']));
     $a_direccion   = remove_junk($db->escape($_POST['asoc_dir']));
     $a_departamento   = remove_junk($db->escape($_POST['cod_departamento']));
     $a_municipio  = remove_junk($db->escape($_POST['cod_municipio']));
     $a_celular  = remove_junk($db->escape($_POST['asoc_cel']));
     $a_representante   = remove_junk($db->escape($_POST['asoc_rep']));
     $a_duirepresentante  = remove_junk($db->escape($_POST['asoc_dui_rep']));
     $a_nitrepresentante   = remove_junk($db->escape($_POST['asoc_nit_rep']));
     $a_profrepresentante   = remove_junk($db->escape($_POST['asoc_prof_rep']));
     $a_fechancimiento  = remove_junk($db->escape($_POST['asoc_rep_fn']));
	     
     $query  = "INSERT INTO asociacion (nom_asociacion, abr_asociacion,nit_asociacion,tel_asociacion,dir_asociacion,cod_departamento, cod_municipio, cel_asociacion, rep_asociacion, dui_rep_asoc, nit_rep_asoc, prof_rep_asoc, fech_nac_rep_asoc) VALUES ('{$a_nombre}','{$a_abrev }','{$a_nit}','{$a_telefono}','{$a_direccion}', '{$a_departamento}','{$a_municipio}','{$a_celular}','{$a_representante}','{$a_duirepresentante }','{$a_nitrepresentante }','{$a_profrepresentante}','{$a_fechancimiento}')";
     $query .=" ON DUPLICATE KEY UPDATE nom_asociacion='{$a_nombre}'";
	 
	 
	 
     if($db->query($query)){
       $session->msg('s',"Asociacion agregada exitosamente. ");
       redirect('add_asociacion.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_asociacion.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_asociacion.php',false);
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
            <span>Asociacion</span>
         </strong>
        </div>
          
          
        <div class="panel-body">
         <div class="col-md-12">
<!--Inicio formulario principal-->       
   <form method="post" action="add_asociacion.php" class="clearfix"> 
 <div class="form-row">
 	<!--<div class="form-group col-md-4">-->
      <label for="cod_asociacion">Código Asociacion</label>
      <input type="text" name="cod_asociacion" class="form-control" id="cod_asociacion" readonly>
  </div>
     
 <div class="form-row">
      <label for="asoc_nombre">Nombre:</label>
      <input type="text" name="asoc_nombre" class="form-control" id="asoc_nombre" maxlength="60" autofocus required>
 </div>
         
         
    <div class="form-row"> 
    <div class="form-group col-md-6">
      <label for="asoc_abrev">Abreviacion</label>
      <input type="text" name="asoc_abrev" class="form-control" id="asoc_abrev" maxlength="10" autofocus required>
    </div>
  
   
  <div class="form-group col-md-6">
    <label for="asoc_nit">NIT * (formato: xxxx-xxxxxx-xxx-x)</label>
    <input type="text" name="asoc_nit" onkeyup="mascara(this,'-',patron3,true)" class="form-control" id="asoc_nit" placeholder="Ej. 1236-221299-325-4">
   </div>  
   </div>   
       
  <div class="form-row"> 
  <div class="form-group col-md-6">
      <label for="asoc_tel">Teléfono * (formato: xxxx-xxxx)</label>
      <input type="text" name="asoc_tel" class="form-control" onKeyUp="mascara(this,'-',patron,true)" id="asoc_tel" placeholder="Ej. 7878-9844">
      
      
         </div>
  <div class="form-group col-md-6">
      <label for="asoc_cel">Celular (formato: xxxx-xxxx)</label>
      <input type="text" name="asoc_cel" class="form-control" onKeyUp="mascara(this,'-',patron,true)" id="asoc_cel" placeholder="Ej. 2235-5687" >
        </div>
      
  </div>    
       
      
    <div class="form-row"> 
      <label for="asoc_dir">Dirección</label>
      <input type="text" name="asoc_dir" class="form-control" id="asoc_dir" placeholder="Dirección: lote, calle, numero casa" maxlength="100" autofocus required>
  </div>
  
   <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="cod_departamento">Departamento</label>
      <?php
		// Consulta la tabla departamento para obtenerla lista del select
		$query_depto = ("SELECT * FROM inv_departamento ORDER BY cod_departamento ASC");
		
		$result_depto = $db->query($query_depto);
								?>
      <select id="cont" name="cod_departamento" class="form-control" onChange="load(this.value)" required>
        <option selected>Seleccione Departamento</option>
        <?php
		 while($row_depto = mysqli_fetch_array($result_depto))
			{
			 printf("<option value='".$row_depto['cod_departamento']." '>".$row_depto['departamento']."</option>");
		 	
                         }
			mysqli_free_result($result_depto);
                        //$id_dpto= $POST['cod_departamento'];
                        
		?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="cod_municipio">Municipio</label>
      
        
      
      <select id="mostrar_select" name="cod_municipio" class="form-control" width="90%" required>
        <option selected>Seleccione Municipio</option>
        
          <?php
		 while($row_mpio = mysqli_fetch_array($result_mpio))
			{
			 printf("<option value='".$row_mpio['cod_municipio']." '>".$row_mpio['municipio']."</option>");
                      
		 	}
			mysqli_free_result($result_mpio);
                        ?>
      </select>
    </div>
    
  </div>
       
       <div class="form-row">
           <label for="asoc_rep">Representante:</label>
           <input type="text" name="asoc_rep" class="form-control" id="asoc_rep" maxlength="40" autofocus required>
    </div>
       
 <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="asoc_dui_rep">DUI * (formato: xxxxxxxx-x)</label>
      <input type="text" name="asoc_dui_rep" onkeyup="mascara(this,'-',patron2,true)" class="form-control" id="asoc_dui_rep" placeholder="Formato: 04798895-9">
    </div>
     
      <div class="form-group col-md-6">
    <label for="asoc_nit_rep">NIT * (formato: xxxx-xxxxxx-xxx-x)</label>
    <input type="text" name="asoc_nit_rep" onkeyup="mascara(this,'-',patron3,true)" class="form-control" id="asoc_nit_rep" placeholder="Ej. 1236-221299-325-4">
  </div>
     
    <div class="form-group col-md-6">
      <label for="asoc_prof_rep">Profesion</label>
      <input type="text" name="asoc_prof_rep" class="form-control"  id="asoc_prof_rep" maxlength="20" autofocus required>
    </div>
    <div class="form-group col-md-6">
      <label for="asoc_rep_fn">Fecha de nacimiento</label>
      <input type="date"   name="asoc_rep_fn" class="form-control" autofocus required>
     
    
    </div>
  </div> 
  
   
 
 

  <div class="row">
      
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="add_asociacion" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-6" align="right">
      <a href="asociacion.php" class="btn btn-primary">Regresar</a>  
    </div>
  </div>
 </form>  
  </div>      
               
<!--Fin formulario principal-->


<?php include_once('layouts/footer.php'); ?>
