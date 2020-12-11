<?php
  $page_title = 'Agregar Tuberia';
  require_once('includes/load.php');
   page_require_level(2);
   $tuberia = join_inv_tuberias_table();
   ?>

<?php
  
 if(isset($_POST['add_tuberia'])){
   $req_fields = array('cod_material_t','cod_jerarquia_t','diametro_tub', 'presion_tub','longitud_tuberia','estado_tub','longitud_ini_tub','latitud_ini_tub','longitud_fin_tub','latitud_fin_tub','altura_tub');
   validate_fields($req_fields);
   if(empty($errors)){
     $t_cod_material   = remove_junk($db->escape($_POST['cod_material_t']));
     $t_cod_jerarquia  = remove_junk($db->escape($_POST['cod_jerarquia_t']));
     $t_diametro   = remove_junk($db->escape($_POST['diametro_tub']));
     $t_presion  = remove_junk($db->escape($_POST['presion_tub']));
     $t_longitud_tub   = remove_junk($db->escape($_POST['longitud_tuberia']));
     $t_estado   = remove_junk($db->escape($_POST['estado_tub']));
     $t_longitud_ini  = remove_junk($db->escape($_POST['longitud_ini_tub']));
     $t_latitud_ini  = remove_junk($db->escape($_POST['latitud_ini_tub']));
     $t_longitud_fin  = remove_junk($db->escape($_POST['longitud_fin_tub']));
     $t_latitud_fin   = remove_junk($db->escape($_POST['latitud_fin_tub']));
     $t_altura   = remove_junk($db->escape($_POST['altura_tub']));
     
     
     $query  = "INSERT INTO inv_tuberias (cod_material, cod_jerarquia, diametro_nominal, presion_nominal, longitud_tub, estado, longitud_ini, latitud_ini, longitud_fin, latitud_fin, altura)";
     $query .= "VALUES ('{$t_cod_material}','{$t_cod_jerarquia}','{$t_diametro}','{$t_presion}','{$t_longitud_tub}', '{$t_estado}','{$t_longitud_ini}','{$t_latitud_ini}','{$t_longitud_fin}','{$t_latitud_fin}','{$t_altura}')";

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
 	<div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
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
      </div>
       
       <div class="form-row">
 	<div class="form-group col-md-4">
        <label for="diametro_tub">Diametro nominal(pulgadas)</label>
        <input type="number" name="diametro_tub" class="form-control" id="diametro_tub" min="0" value="0.00" step="0.1">
        </div>
       
        <div class="form-group col-md-4">
        <label for="presion_tub">Presion nominal(Kg/cm2)</label>
        <input type="number" name="presion_tub" class="form-control" id="presion_tub" min="0" value="000.0" step="0.1">
        </div>
           
        <div class="form-group col-md-4">
            <label for="estado_tub">Estado</label>
            <select id="estado_tub" name="estado_tub" class="form-control">
            <option value="1">Inventario</option>
            <option value="2">Instalada</option>
            </select>
            </div> 
        </div>
       
       
       
       <div class="row">
        <div class="form-group">
        <label for="ubicaGeo">Ubicacion Geografica</label>
        </div>
        </div>
        <div class="row">
        <div class="form-group col-md-4">
        <label for="latitud_ini_tub">Latitud inicial * (Ej. 13.xxxxxx")</label>
        <input type="number" name="latitud_ini_tub" class="form-control" id="latitud_ini_tub" placeholder="Ej. 13.xxxxxx" min="13.0" max="15.0" step="0.000001" value="13.00000">
        </div>
        <div class="form-group col-md-4">
        <label for="longitud_ini_tub">Longitud inicial* (Ej. -88.xxxxxx)</label>
        <input type="number" name="longitud_ini_tub" class="form-control" id="longitud_ini_tub" placeholder="Ej. -88.xxxxxx" min="-90.0" max="-87.0" step="0.000001" value="-88.00000">
        </div>
        <div class="form-group col-md-4">
        <label for="altura_tub">Altura * (Ej. 110 msnm)</label>
        <input type="number" name="altura_tub" class="form-control" id="altura_tub" placeholder="Ej. 110" min="0"  value="0">
        </div>
        </div>
       
       
       <div class="row">
        <div class="form-group col-md-4">
        <label for="latitud_fin_tub">Latitud final* (Ej. 13.xxxxxx")</label>
        <input type="number" name="latitud_fin_tub" class="form-control" id="latitud_fin_tub" placeholder="Ej. 13.xxxxxx" min="13.0" max="15.0" step="0.000001" value="13.000000">
        </div>
        <div class="form-group col-md-4">
        <label for="longitud_fin_tub">Longitud final * (Ej. -88.xxxxxx)</label>
        <input type="number" name="longitud_fin_tub" class="form-control" id="longitud_fin_tub" placeholder="Ej. -88.xxxxxx" min="-90.0" max="-87.0" step="0.000001" value="-88.000000">
        </div>
        
           
        <div class="form-group col-md-4">
        <label for="longitud_tuberia"> Longitud de la tuberia* (metros")</label>
        <input type="number" name="longitud_tuberia" class="form-control" id="longitud_tuberia" min="0" value="0">
        </div>
        </div>
       
       
        <div class="row">
        
        <div class="form-group col-md-6" align="left">
        <input type="submit" name="add_tuberia" id="submit" value="Guardar" class="btn btn-primary">
        </div>
        <div class="form-group col-md-6" align="right">
        <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
      
        </div>
       
        </div>
       </div>
  </div>
 </form>  
    
               
<!--Fin formulario principal-->
		
         
      </div>
  </div>
<?php include_once('layouts/footer.php'); ?>