<?php
  $page_title = 'Agregar Tuberia';
  require_once('includes/load.php');
   page_require_level(2);
   $tuberia = join_inv_tuberias_table();
   ?>

<?php
  
 if(isset($_POST['add_tuberia'])){
   $req_fields = array('cod_material_t','cod_jerarquia_t','diametro_tub', 'presion_tub','longitud_tuberia','estado_tub','idCoordenadas');
   validate_fields($req_fields);
   if(empty($errors)){
     $t_cod_material   = remove_junk($db->escape($_POST['cod_material_t']));
     $t_cod_jerarquia  = remove_junk($db->escape($_POST['cod_jerarquia_t']));
     //falta agregar el id de ubiacion 
     $t_diametro   = remove_junk($db->escape($_POST['diametro_tub']));
     $t_presion  = remove_junk($db->escape($_POST['presion_tub']));
     $t_longitud_tub   = remove_junk($db->escape($_POST['longitud_tuberia']));
     $t_estado   = remove_junk($db->escape($_POST['estado_tub']));
     $t_idCoordenadas  = remove_junk($db->escape($_POST['idCoordenadas']));
     
     
     $query  = "INSERT INTO inv_tuberias (cod_material, cod_jerarquia, diametro_nominal, presion_nominal, longitud_tub, estado,idCoordenadas)";
     $query .= "VALUES ('{$t_cod_material}','{$t_cod_jerarquia}','{$t_diametro}','{$t_presion}','{$t_longitud_tub}', '{$t_estado}','{$t_idCoordenadas}')";

//$query .=" ON DUPLICATE KEY UPDATE cod_materia='{$t_cod_material}'";
	 
	 
     if($db->query($query)){
       $session->msg('s',"Tuberia agregada exitosamente. ");
       redirect('add_tuberia.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('tuberia.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_tuberia.php',false);
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
            <span>Tuberias</span>
          </strong>
        </div>
    <div class="panel-body">
    <div class="col-md-12">
    <!--Inicio formulario principal-->       
   <form method="post" action="add_tuberia.php" class="clearfix"> 
       <div class="form-row">
 	<div class="form-group col-md-4">
        <label for="material_tub">Material de tuberia</label>
         <?php
		// Consulta la tabla material para obtenerla lista del select
		$query_mat = ("SELECT * FROM mat_tuberia ORDER BY cod_material ASC");
		
		$result_mat = $db->query($query_mat);
								?>
        <select id="cont" name="cod_material_t" class="form-control" onChange="load(this.value)" required>
        <option selected>Material</option>
        <?php
		 while($row_mat = mysqli_fetch_array($result_mat))
			{
                         printf("<option value='".$row_mat['cod_material']."'>".$row_mat['material']."</option>");
                                        
		 	}
			mysqli_free_result($result_mat);
		?>
        </select>
        </div>
        <div class="form-group col-md-4">
        <label for="jerarquia_tub">Jerarquia de tuberia</label>
         <?php
		// Consulta la tabla jerarquia para obtenerla lista del select
		$query_jer = ("SELECT * FROM jerarquia_tuberia ORDER BY cod_jerarquia ASC");
		
		$result_jer = $db->query($query_jer);
								?>
        <select id="cont1" name="cod_jerarquia_t" class="form-control" onChange="load(this.value)" required>
        <option selected>Jerarquia</option>
        <?php
		 while($row_jer = mysqli_fetch_array($result_jer))
			{
			 printf("<option value='".$row_jer['cod_jerarquia']."'>".$row_jer['jerarquia']."</option>");
                     
		 
		 	}
			mysqli_free_result($result_jer);
		?>
        </select>
        </div>
           
           
           
           <div class="form-group col-md-4">
        <label for="idCoordenadas">Descripcion de tuberia</label>
         <?php
		// Consulta la tabla para presentar descripcion de tuberia en ubicacion 
		$query_coor = ("SELECT * FROM coordenadas_tuberias ORDER BY idCoordenadas ASC");
		
		$result_coor = $db->query($query_coor);
								?>
        <select id="cont" name="idCoordenadas" class="form-control" onChange="load(this.value)" required>
        <option selected>Descripcion tuberia</option>
        <?php
		 while($row_coor = mysqli_fetch_array($result_coor))
			{
                         printf("<option value='".$row_coor['idCoordenadas']."'>".$row_coor['Descripcion']."</option>");
                                        
		 	}
			mysqli_free_result($result_coor);
		?>
        </select>
        </div>
      </div>
       
       <div class="form-row">
 	<div class="form-group col-md-3">
        <label for="diametro_tub">Diametro nominal(pulgadas)</label>
        <input type="number" name="diametro_tub" class="form-control" id="diametro_tub" min="0" value="0.00" step="0.1">
        </div>
       
        <div class="form-group col-md-3">
        <label for="presion_tub">Presion nominal(Kg/cm2)</label>
        <input type="number" name="presion_tub" class="form-control" id="presion_tub" min="0" value="000.0" step="0.1">
        </div>
           
         <div class="form-group col-md-3">
        <label for="longitud_tuberia"> Longitud de la tuberia* (metros")</label>
        <input type="number" name="longitud_tuberia" class="form-control" id="longitud_tuberia" min="0" value="0">
        </div>  
           
        <div class="form-group col-md-2">
            <label for="estado_tub">Estado</label>
            <select id="estado_tub" name="estado_tub" class="form-control">
            <option value="1">Inventario</option>
            <option value="2">Instalada</option>
            </select>
            </div> 
           
           
            
        </div>
       
       
       
       
       
        <div class="row">
        
        <div class="form-group col-md-6" align="left">
        <input type="submit" name="add_tuberia" id="submit" value="Guardar" class="btn btn-primary">
        </div>
        
       <div class="form-group col-md-6" align="right">
        <a href="tuberia.php" class="btn btn-primary">Regresar</a> 
      
        </div>
        </div>
       </div>
  </div>
 </form>  
    
               
<!--Fin formulario principal-->
		
         
      </div>
  </div>
<?php include_once('layouts/footer.php'); ?>