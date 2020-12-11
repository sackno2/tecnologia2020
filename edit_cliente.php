<?php
  $page_title = 'Editar cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$cliente = find_by_id2('inv_cliente',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$cliente){
  $session->msg("d","Cliente no encontrado por Codigo.",$cliente);
  redirect('cliente.php');
}
?>
<?php
 if(isset($_POST['edit_cliente'])){
    $req_fields = array('num_cuenta','fecha_actual','nombres_cli', 'apellidos_cli','fech_naci','direccion_cli','cod_departamento','cod_municipio','sexo_cli','dui','telefono_cli','celular_cli','nit','email_cli','num_medidor','lect_inicial','estado_cli','latitud_cli','longitud_cli','altura_cli' );
    validate_fields($req_fields);

   if(empty($errors)){
       //$c_codcliente  = remove_junk($db->escape($_POST['cod_cliente']));*/
     $c_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
     $c_fechactual   = remove_junk($db->escape($_POST['fecha_actual']));
     $c_nombres   = remove_junk($db->escape($_POST['nombres_cli']));
     $c_apellidos  = remove_junk($db->escape($_POST['apellidos_cli']));
     $c_fechanaci   = remove_junk($db->escape($_POST['fech_naci']));
     $c_direccion   = remove_junk($db->escape($_POST['direccion_cli']));
     $c_departamento   = remove_junk($db->escape($_POST['cod_departamento']));
     $c_municipio  = remove_junk($db->escape($_POST['cod_municipio']));
	 $c_sexo  = remove_junk($db->escape($_POST['sexo_cli']));
	 $c_dui  = remove_junk($db->escape($_POST['dui']));
     $c_telefono   = remove_junk($db->escape($_POST['telefono_cli']));
     $c_celular   = remove_junk($db->escape($_POST['celular_cli']));
     $c_nit   = remove_junk($db->escape($_POST['nit']));
     $c_correo  = remove_junk($db->escape($_POST['email_cli']));
	 $c_nummedi  = remove_junk($db->escape($_POST['num_medidor']));
     $c_lectmedi   = remove_junk($db->escape($_POST['lect_inicial']));
     $c_estado   = remove_junk($db->escape($_POST['estado_cli']));
     $c_latitud   = remove_junk($db->escape($_POST['latitud_cli']));
     $c_longitud  = remove_junk($db->escape($_POST['longitud_cli']));
     if (is_null($_POST['altura_cli']) || $_POST['altura_cli'] === "") {
       $media_id = '0';
       } else {
        $c_altura = remove_junk($db->escape($_POST['altura_cli']));
       }
       $query   = "UPDATE inv_cliente SET";
       $query  .=" num_cuenta='{$c_numcuenta}', fecha_crea='{$c_fechactual}', nombre='{$c_nombres}',
";
       $query  .=" apellido='{$c_apellidos}', fecha_naci= '{$c_fechanaci}', direccion='{$c_direccion}', cod_municipio='{$c_municipio}',";
	   $query  .="cod_departamento= '{$c_departamento}',  sexo='{$c_sexo}',  dui='{$c_dui}', telefono='{$c_telefono}',
";
       $query .=" celular='{$c_celular}', nit= '{$c_nit}', mail='{$c_correo}', num_medidor='{$c_nummedi}', lectura_ini='{$c_lectmedi}',";
	   $query .=" estado='{$c_estado}', latitud='{$c_latitud}', longitud='{$c_longitud}', altura='{$c_altura}'";
	   $query  .=" WHERE cod_cliente ='{$cliente['cod_cliente']}'";
	   
	   
	   $actualiza=("UPDATE inv_medidor SET asignado='SI' WHERE cod_medidor='$c_nummedi'");
	   $result1 =$db->query($actualiza);
	   
	   
	  
		if($c_nummedi <> $cliente['num_medidor'])
		{ 
		
		$actualiza2=("UPDATE inv_medidor SET asignado='NO' WHERE cod_medidor='$cliente[num_medidor]'");
	    $result2 =$db->query($actualiza2);  
		   
		}
	  
	   
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Cliente ha sido actualizado. ");
                 redirect('cliente.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_cliente.php?id='.$cliente['cod_cliente'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_cliente.php?cod_cliente='.$cliente['cod_cliente'], false);
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
            <span>Editar Cliente</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="edit_cliente.php?id=<?php echo remove_junk($cliente['cod_cliente']) ?>" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="cod_cliente">Código Cliente</label>
      <input type="text" name="cod_cliente" class="form-control" id="cod_cliente" value="<?php echo remove_junk($cliente['cod_cliente']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="num_cuenta">No. Cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($cliente['num_cuenta']);?>" autofocus required>
    </div>
    <div class="form-group col-md-2">
      <label for="fecha_actual">Fecha</label>
      <input type="text" name="fecha_actual" value="<?php echo remove_junk($cliente['fecha_crea']);?>" class="form-control" id="fecha_actual" autofocus>
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="nombres_cli">Nombres</label>
    <input type="text" name="nombres_cli" class="form-control" placeholder="Nombres" value="<?php echo remove_junk($cliente['nombre']);?>" autofocus required >  
  </div>  
  
  <div class="form-group col-md-6">
      <label for="apellidos_cli">Apellidos</label>
      <input type="text" name="apellidos_cli" class="form-control" id="apellidos_cli" value="<?php echo remove_junk($cliente['apellido']);?>" placeholder="Apellidos" autofocus required>
    </div>
  <div class="form-group col-md-6">
      <label for="fecha_naci">Fecha de Nacimiento</label>
      <input type="date" name="fech_naci" class="form-control" id="fecha_naci" value="<?php echo remove_junk($cliente['fecha_naci']);?>" placeholder="dd/mm/aa" autofocus required>
  </div>
  <div class="form-group col-md-6">
      <label for="direccion_cli">Dirección</label>
      <input type="text" name="direccion_cli" class="form-control" id="direccion_cli" value="<?php echo remove_junk($cliente['direccion']);?>" placeholder="Dirección: lote, calle, numero casa" autofocus required>
  </div>
  </div>
       
           
   <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="departamento_cli">Departamento</label>
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
			 <option value="<?php echo $row_depto['cod_departamento']; ?>" <?php if($cliente['cod_departamento'] === $row_depto['cod_departamento']) {
				 echo "selected"; }; ?> >
                 <?php echo $row_depto['departamento']; ?></option>
		 	
			<?php }; 
            
            mysqli_free_result($result_depto);
		?>
      </select>
      
    </div>
    <div class="form-group col-md-4">
      <label for="municipio_cli">Municipio</label>
       <?php
		// Consulta la tabla departamento para obtenerla lista del select
		$query_muni = ("SELECT * FROM inv_municipio ORDER BY cod_municipio ASC");
		
		$result_muni = $db->query($query_muni);
								?>
      <select id="mostrar_select" name="cod_municipio" class="form-control" width="90%" required>
        <?php
		 while($row_muni = mysqli_fetch_array($result_muni)) 
			{ ?>
			 <option value="<?php echo $row_muni['cod_municipio']; ?>" <?php if($cliente['cod_municipio'] === $row_muni['cod_municipio']) {
				 echo "selected"; }; ?> >
                 <?php echo $row_muni['municipio']; ?></option>
		 	
			<?php }; 
            
            mysqli_free_result($result_muni);
		?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="sexo_cli">Sexo</label>
      <select id="sexo_cli" name="sexo_cli" class="form-control">
        <option value="<?php echo remove_junk($cliente['sexo']); ?>" <?php if($cliente['sexo']==="1"){ $sexo1="Femenino";} else{ $sexo1="Masculino";} echo "selected";  ?> ><?php echo $sexo1; ?></option>
        <option value="1">Femenino</option>
        <option value="2">Masculino</option>
      </select>
    </div>
  </div>
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="dui_cli">DUI * (formato: xxxxxxxx-x)</label>
      <input type="text" name="dui" onkeyup="mascara(this,'-',patron2,true)" class="form-control" id="dui" placeholder="Formato: 04798895-9" value="<?php echo remove_junk($cliente['dui']); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="telefono_cli">Teléfono * (formato: xxxx-xxxx)</label>
      <input type="text" name="telefono_cli" class="form-control" onKeyUp="mascara(this,'-',patron,true)" id="telefono_cli" placeholder="Ej. 2235-5687" value="<?php echo remove_junk($cliente['telefono']); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="celular_cli">Celular *  (formato: xxxx-xxxx)</label>
       <input type="text" name="celular_cli" class="form-control" onkeyUp="mascara(this,'-',patron,true)" id="celular_cli" placeholder="Ej. 6235-2545" value="<?php echo remove_junk($cliente['celular']); ?>">
    </div>
  </div> 
  
 
   
  <div class="form-group col-md-6">
    <label for="nit_cli">NIT * (formato: xxxx-xxxxxx-xxx-4x)</label>
    <input type="text" name="nit" onkeyup="mascara(this,'-',patron3,true)" class="form-control" id="nit_cli" placeholder="Ej. 1236-221299-325-4" value="<?php echo remove_junk($cliente['nit']); ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="email_cli">Correo electrónico * (Ej. juanperez@gmail.com)</label>
    <input type="mail" name="email_cli" class="form-control" id="email_cli" placeholder="xxxxxx@yyyyyy.zzz" value="<?php echo remove_junk($cliente['mail']); ?>">
  </div>
<div class="form-row">
    <div class="form-group col-md-4">
     <?php
		// Consulta la tabla medidor para obtenerla lista del select
		
		$query_m = ("SELECT * FROM inv_medidor WHERE asignado='NO' ORDER BY cod_medidor ASC");
		$result_m = $db->query($query_m);
		
	  ?>	
      <label for="num_medidor">Medidor</label>
      <select id="num_medidor" name="num_medidor" class="form-control" >
      
		 
        <option value="<?php echo remove_junk($cliente['num_medidor']); ?>" selected><?php echo remove_junk($cliente['num_medidor']); ?></option>
		<?php while($row_m = mysqli_fetch_array($result_m)) 
			{ ?>
           
        <option value="<?php echo $row_m['cod_medidor']; ?>"><?php echo $row_m['cod_medidor']; ?></option>
                 
           <?php }; 
		mysqli_free_result($result_m);
		?>      
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="lec_inicial">Lectura inicial</label>
      <input type="text" name="lect_inicial" class="form-control" id="lect_inicial" value="<?php echo remove_junk($cliente['lectura_ini']); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="estado_cli">Estado</label>
      <select id="estado_cli" name="estado_cli" class="form-control">
        <option value="1">Inactivo</option>
        <option value="2">Activo</option>
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
      <label for="latitud_cli">Latitud * (Ej. 13.xxxxxx")</label>
      <input type="text" name="latitud_cli" class="form-control" id="latitud_cli" placeholder="Ej. 13.xxxxxx" value="<?php echo remove_junk($cliente['latitud']); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="longitud_cli">Longitud * (Ej. -88.xxxxxx)</label>
      <input type="text" name="longitud_cli" class="form-control" id="longitud_cli" placeholder="Ej. -88.xxxxxx" value="<?php echo remove_junk($cliente['longitud']); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="altura_cli">Altura * (Ej. 110 msnm)</label>
       <input type="text" name="altura_cli" class="form-control" id="altura_cli" placeholder="Ej. 110" value="<?php echo remove_junk($cliente['altura']); ?>">
    </div>
  </div>
<!--<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>-->
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="edit_cliente" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="right">
      <a href="reportecliente1PDF.php?id=<?php echo (int)$cliente['cod_cliente'];?>" class="btn btn-primary"   target="_blank">Reporte</a>  
      
    </div>
  </div>
 </form>  
      
<!--Hasta aqui el formulario -->
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
