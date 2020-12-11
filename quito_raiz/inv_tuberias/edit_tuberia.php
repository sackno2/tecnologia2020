<?php
  $page_title = 'Editar tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php
$tuberia  = find_by_id_tub('inv_tuberias',(int)$_GET['id']);
if(!$tuberia){
  $session->msg("d","Tuberia no encontrada por Codigo.",$tuberia);
  redirect('tuberia.php');
}
?>

<?php
 if(isset($_POST['edit_tuberia'])){
    $req_fields = array('cod_material_t','cod_jerarquia_t','diametro_tub', 'presion_tub','longitud_tuberia','estado_tub','longitud_ini_tub','latitud_ini_tub','longitud_fin_tub','latitud_fin_tub','altura_tub');
    validate_fields($req_fields);

   if(empty($errors)){
       //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
       
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
     
       $query   = "UPDATE inv_tuberias SET";
       $query  .=" cod_material='{$t_cod_material}', cod_jerarquia='{$t_cod_jerarquia}', diametro_nominal='{$t_diametro}',";
       $query  .="presion_nominal='{$t_presion}', longitud_tub='{$t_longitud_tub}', estado='{$t_estado}', longitud_ini='{$t_longitud_ini}',";	   
       $query  .="latitud_ini='{$t_latitud_ini}', longitud_fin='{$t_longitud_fin}', latitud_fin='{$t_latitud_fin}', altura='{$t_altura}'";	   
       $query  .="WHERE cod_tuberia ='{$tuberia['cod_tuberia']}'";
	   
	   
        $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Tuberia ha sido actualizada. ");
                 redirect('tuberia.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_tuberia.php?id='.$tuberia['cod_tuberia'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_tuberia.php?cod_tuberia='.$tuberia['cod_tuberia'], false);
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
            <span>Editar tuberia</span>
         </strong>
        </div>
    <div class="panel-body">
         <div class="col-md-12">
             
         <!--Inicio formulario principal-->       
         <form method="post" action="edit_tuberia.php?id=<?php echo remove_junk($tuberia['cod_tuberia']) ?>" class="clearfix">     
         <div class="form-row">
            <div class="form-group col-md-4">
            <label for="cod_tuberia">Código Tuberia</label>
            <input type="text" name="cod_tuberia" class="form-control" id="cod_tuberia"  value="<?php echo remove_junk($tuberia['cod_tuberia']);?>" readonly>
            </div> 
             </div>
             
        
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="material">Material de tuberia</label>
                    
            <?php
		// Consulta la tabla material para obtenerla lista del select
		$query_mat = ("SELECT * FROM mat_tuberia ORDER BY cod_material ASC");
		
		$result_mat = $db->query($query_mat); 
								?>
            
            <select id="cont" name="cod_material_t" class="form-control" onChange="load(this.value)" required>
               <!-- <option selected>Material</option>--> 
                <?php
                 while($row_mat = mysqli_fetch_array($result_mat))
			{ ?>
                	 <option value="<?php echo $row_mat['cod_material']; ?>" <?php if($tuberia['cod_material'] === $row_mat['cod_material']) {
				 echo "selected"; }; ?> >
                                <?php echo $row_mat['material']; ?>
                         </option>
		 	
                <?php }; 
            
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
                <!-- <option selected>Jerarquia</option> -->
                <?php
                    while($row_jer = mysqli_fetch_array($result_jer))			{ ?>
                	 <option value="<?php echo $row_jer['cod_jerarquia']; ?>" <?php if($tuberia['cod_jerarquia'] === $row_jer['cod_jerarquia']) {
				 echo "selected"; }; ?> >
                 <?php echo $row_jer['jerarquia']; ?></option>
		 	
                <?php }; 
            
                mysqli_free_result($result_jer);
		?>
            </select>
       </div>
            </div>
       
       <div class="form-row">
 	<div class="form-group col-md-4">
        <label for="diametro_tub">Diametro nominal(pulgadas)</label>
        <input type="number" name="diametro_tub" class="form-control" id="diametro_tub" min="0.00" value="<?php echo remove_junk($tuberia['diametro_nominal']); ?>" step="0.01">
        </div>
        
        <div class="form-group col-md-4">
        <label for="presion_tub">Presion nominal(Kg/cm2)</label>
        <input type="number" name="presion_tub" class="form-control" id="presion_tub" min="0.0" value="<?php echo remove_junk($tuberia['presion_nominal']); ?>" step="0.1">
        </div>
           
      <div class="form-group col-md-4">
           <label for="estado">Estado</label>
            <select id="estado_tub" name="estado_tub" class="form-control">
            <option value="<?php echo remove_junk($tuberia['estado']); ?>" <?php if($tuberia['estado']==="1"){ $estado1="Inventario";} else{ $estado1="Instalada";} echo "selected";  ?> ><?php echo $estado1; ?></option>
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
        <div class="form-row">
        <div class="form-group col-md-4">
        <label for="latitud_ini_tub">Latitud inicial * (Ej. 13.xxxxxx")</label>
        <input type="number" name="latitud_ini_tub" class="form-control" id="latitud_ini_tub" placeholder="Ej. 13.xxxxxx" min="13.0" max="15.0" step="0.000001" value="<?php echo remove_junk($tuberia['latitud_ini']); ?>">
        </div>
        <div class="form-group col-md-4">
        <label for="longitud_ini_tub">Longitud inicial* (Ej. -88.xxxxxx)</label>
        <input type="number" name="longitud_ini_tub" class="form-control" id="longitud_ini_tub" placeholder="Ej. -88.xxxxxx" min="-90.0" max="-87.0" step="0.000001" value="<?php echo remove_junk($tuberia['longitud_ini']); ?>">
        </div>
        <div class="form-group col-md-4">
        <label for="altura_tub">Altura * (Ej. 110 msnm)</label>
        <input type="number" name="altura_tub" class="form-control" id="altura_tub" placeholder="Ej. 110" min="0"  value="<?php echo remove_junk($tuberia['altura']); ?>">
        </div>
        </div>
       
       
       <div class="form-row">
        <div class="form-group col-md-4">
        <label for="latitud_fin_tub">Latitud final* (Ej. 13.xxxxxx")</label>
        <input type="number" name="latitud_fin_tub" class="form-control" id="latitud_fin_tub" placeholder="Ej. 13.xxxxxx" min="13.0" max="15.0" step="0.000001" value="<?php echo remove_junk($tuberia['latitud_fin']); ?>">
        </div>
        <div class="form-group col-md-4">
        <label for="longitud_fin_tub">Longitud final * (Ej. -88.xxxxxx)</label>
        <input type="number" name="longitud_fin_tub" class="form-control" id="longitud_fin_tub" placeholder="Ej. -88.xxxxxx" min="-90.0" max="-87.0" step="0.000001" value="<?php echo remove_junk($tuberia['longitud_fin']); ?>">
        </div>
        
           
        <div class="form-group col-md-4">
        <label for="longitud_tuberia"> Longitud de la tuberia* (metros")</label>
        <input type="number" name="longitud_tuberia" class="form-control" id="longitud_tuberia" min="0" value="<?php echo remove_junk($tuberia['longitud_tub']); ?>">
        </div>
        </div>
       
       
        <div class="row">
        
        <div class="form-group col-md-4" align="left">
        <input type="submit" name="edit_tuberia" id="submit" value="Guardar" class="btn btn-primary">
        </div>
        <div class="form-group col-md-4" align="right">
        <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
      
        </div>
       
        </div>
      
 
 </form>  
    
<!--Fin formulario principal-->
		
         
      </div>
  </div>
    
    </div>
    </div>
  
<?php include_once('layouts/footer.php'); ?>
             