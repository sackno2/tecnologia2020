<?php
  $page_title = 'Editar Asociacion';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$asociacion = find_by_id_aso('asociacion',(int)$_GET['id']);
if(!$asociacion){
  $session->msg("d","Asociacion no encontrada por Codigo.",$asociacion);
  redirect('asociacion.php');
}
?>

<?php
 if(isset($_POST['edit_asociacion1'])){
    $req_fields = array('asoc_nombre','asoc_abrev','asoc_nit','asoc_tel','asoc_dir','cod_departamento','cod_municipio','asoc_cel','asoc_rep','asoc_dui_rep','asoc_nit_rep','asoc_prof_rep','asoc_rep_fn');
    validate_fields($req_fields);

   if(empty($errors)){
    
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
     $a_fechanacimiento  = remove_junk($db->escape($_POST['asoc_rep_fn']));
       
     $query   = "UPDATE asociacion SET";
     $query  .=" nom_asociacion='{$a_nombre}', abr_asociacion='{$a_abrev}', nit_asociacion='{$a_nit}',";
     $query  .=" tel_asociacion='{$a_telefono}', dir_asociacion= '{$a_direccion}', cod_departamento='{$a_departamento}', cod_municipio='{$a_municipio}',";
     $query  .=" cel_asociacion='{$a_celular}',  rep_asociacion='{$a_representante}', dui_rep_asoc='{$a_duirepresentante}', nit_rep_asoc='{$a_nitrepresentante}',";
     $query  .=" prof_rep_asoc='{$a_profrepresentante}', fech_nac_rep_asoc='{$a_fechanacimiento}'";
     $query  .=" WHERE cod_asociacion ='{$asociacion['cod_asociacion']}'";
              
     $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Asociacion ha sido actualizado. ");
                 redirect('asociacion.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_asociacion.php?id='.$asociacion['cod_asociacion'], false);
               }
       
   } else{
       $session->msg("d", $errors);
       redirect('edit_asociacion.php?cod_asociacion='.$asociacion['cod_asociacion'], false);
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
            <span>Editar Asociacion</span>
         </strong>
        </div>
        <div class="panel-body">
        <div class="col-md-12">
            
    <!--Inicio formulario principal-->       
   <form method="post" action="edit_asociacion.php?id=<?php echo remove_junk($asociacion['cod_asociacion'])?>" class="clearfix"> 
            
       
     <div class="form-row">
            <div class="form-group">
            <label for="cod_asociacion">Código Asociacion</label>
            <input type="text" name="cod_asociacion" class="form-control" id="cod_asociacion" value="<?php echo remove_junk($asociacion['cod_asociacion']);?>" readonly>
            </div>
         
            <div class="form-group">
            <label for="asoc_nombre">Asociacion</label>
            <input type="text" name="asoc_nombre" class="form-control" id="asoc_nombre" value="<?php echo remove_junk($asociacion['nom_asociacion']);?>" autofocus required>
            </div>
     </div>
       
     <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="asoc_abrev">Abreviacion</label>
            <input type="text" name="asoc_abrev" class="form-control" id="asoc_abrev" value="<?php echo remove_junk($asociacion['abr_asociacion']);?>"  autofocus>
           </div>
         
            <div class="form-group col-md-6">
            <label for="asoc_nit">NIT * (formato: xxxx-xxxxxx-xxx-x)</label>
            <input type="text" name="asoc_nit" onkeyup="mascara(this,'-',patron3,true)" class="form-control" id="asoc_nit" placeholder="Ej. 1236-221299-325-4" value="<?php echo remove_junk($asociacion['nit_asociacion']); ?>">
            </div>
    </div>
       
    <div class="form-row">   
                <div class="form-group col-md-6">
                <label for="asoc_tel">Teléfono * (formato: xxxx-xxxx)</label>
                <input type="text" name="asoc_tel" class="form-control" onKeyUp="mascara(this,'-',patron,true)" id="asoc_tel" placeholder="Ej. 2235-5687" value="<?php echo remove_junk($asociacion['tel_asociacion']); ?>">
                </div>
                <div class="form-group col-md-6">
                <label for="asoc_cel">Celular *  (formato: xxxx-xxxx)</label>
                <input type="text" name="asoc_cel" class="form-control" onkeyUp="mascara(this,'-',patron,true)" id="asoc_cel" placeholder="Ej. 6235-2545" value="<?php echo remove_junk($asociacion['cel_asociacion']); ?>">
                </div>
                <div class="form-group">
                <label for="asoc_dir">Dirección</label>
                <input type="text" name="asoc_dir" class="form-control" id="asoc_dir" value="<?php echo remove_junk($asociacion['dir_asociacion']);?>" placeholder="Dirección: lote, calle, numero casa" autofocus required>
                </div>
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
      
                <option selected>--------</option>
                <?php
		while($row_depto = mysqli_fetch_array($result_depto)) 
			{ ?>
			 <option value="<?php echo $row_depto['cod_departamento']; ?>" <?php if($asociacion['cod_departamento'] === $row_depto['cod_departamento']) {
				 echo "selected"; }; ?> >
                 <?php echo $row_depto['departamento']; ?></option>
		 	
                <?php }; 
            
                mysqli_free_result($result_depto);
		?>
            </select>
      
            </div>
       
            <div class="form-group col-md-6">
            <label for="cod_municipio">Municipio</label>
            <?php
		// Consulta la tabla departamento para obtenerla lista del select
		$query_muni = ("SELECT * FROM inv_municipio ORDER BY cod_municipio ASC");
		
		$result_muni = $db->query($query_muni);
								?>
            <select id="mostrar_select" name="cod_municipio" class="form-control" width="90%" required>
            <?php
		 while($row_muni = mysqli_fetch_array($result_muni)) 
			{ ?>
			 <option value="<?php echo $row_muni['cod_municipio']; ?>" <?php if($asociacion['cod_municipio'] === $row_muni['cod_municipio']) {
				 echo "selected"; }; ?> >
                 <?php echo $row_muni['municipio']; ?></option>
		 	
			<?php }; 
            
            mysqli_free_result($result_muni);
            ?>
            </select>
            </div>
    </div>
 
       
    <div class="form-row">
      
            <div class="form-group">
            <label for="asoc_rep">Representante</label>
            <input type="text" name="asoc_rep" class="form-control" id="asoc_rep" value="<?php echo remove_junk($asociacion['rep_asociacion']);?>" placeholder="Nombre y Apellidos" autofocus required>
            </div> 
    </div> 

    <div class="form-row">
            <div class="form-group col-md-6">
            <label for="asoc_dui_rep">DUI * (formato: xxxxxxxx-x)</label>
            <input type="text" name="asoc_dui_rep" onkeyup="mascara(this,'-',patron2,true)" class="form-control" id="asoc_dui_rep" placeholder="Formato: 04798895-9" value="<?php echo remove_junk($asociacion['dui_rep_asoc']); ?>">
            </div>
     
            <div class="form-group col-md-6">
            <label for="asoc_nit_rep">NIT * (formato: xxxx-xxxxxx-xxx-x)</label>
            <input type="text" name="asoc_nit_rep" onkeyup="mascara(this,'-',patron3,true)" class="form-control" id="asoc_nit_rep" placeholder="Ej. 1236-221299-325-4" value="<?php echo remove_junk($asociacion['nit_rep_asoc']); ?>">
            </div>
            
        
        <div class="form-group col-md-6">
        <label for="asoc_prof_rep">Profesion</label>
        <input type="text" name="asoc_prof_rep" class="form-control"  id="asoc_prof_rep" value="<?php echo remove_junk($asociacion['prof_rep_asoc']); ?>">
        </div>
        <div class="form-group col-md-6">
        <label for="asoc_rep_fn">Fecha de nacimiento</label>
        <input type="date" name="asoc_rep_fn" class="form-control" id="asoc_rep_fn" value="<?php echo remove_junk($asociacion['fech_nac_rep_asoc']);?>">
        </div>
  </div> 
    
   
       
    <div class="row">
     
            <div class="form-group col-md-6" align="left">
            <input type="submit" name="edit_asociacion1" id="submit" value="Guardar" class="btn btn-primary">
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

       
       

       
  
      


