<?php
  $page_title = 'Carga inicial de lectura';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $clientes = join_inv_cliente_table();
?>

<?php

 $salida="";
 $query = "SELECT * FROM inv_cliente ORDER By cod_cliente";
 
 if(isset($_POST['consulta'])){
		$q = $_POST['consulta'];
		$query = ("SELECT cod_cliente, num_cuenta, nombre, apellido FROM inv_cliente  WHERE num_cuenta LIKE '%".$q."%'");	
	}
	
	$resultado = $db->query($query);


          if($resultado->num_rows > 0){
              
              
              
              
          }
		
?>




<?php		
		
 if(isset($_POST['reg_lect_ini'])){
     echo $_POST['num_cuenta'];
   $req_fields = array('num_cuenta','fecha_rec','nombres_rec','apellidos_rec', 'motivo_rec','solucion_rec','detalle_rec');
   validate_fields($req_fields);
   if(empty($errors)){
     
     $l_numcuenta   = remove_junk($db->escape($_POST['num_cuenta_lec']));
     $l_mes  = remove_junk($db->escape($_POST['mes_lec']));
     $l_anio   = remove_junk($db->escape($_POST['anio_lec']));
     $l_fecha_lectura  = remove_junk($db->escape($_POST['fecha_lectura_lec']));
     $l_lectura_anterior  = remove_junk($db->escape($_POST['lectura_anterior_lec']));
     $l_lectura_actual  = remove_junk($db->escape($_POST['lectura_actual_lec']));
      $l_consumo  = remove_junk($db->escape($_POST['consumo_lec']));
       $l_usuario  = remove_junk($db->escape($_POST['usuario_lec']));
         
         
     if (($_POST['lectura_actual']) < ($_POST['lectura_anterior'])) {
       $l_cobro = 'NV';
     } else {
       $l_cobro = 'CV';
     }
  
      $query  = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,motivo_rec, lectura_anterior, lectura_actual,consumo,id_user) VALUES ('{$l_numcuenta}','{$l_mes}','{$l_anio}','{$l_fecha_lectura}','{$l_lectura_actual}', '{$l_consumo}','{$l_usuario}','{$l_cobro}')";
     
	   if($db->query($query)){
       $session->msg('s',"Lectura agregada exitosamente. ");
       redirect('lectura.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('reg_reclamo.php', false);
     }
              

   } else{
       $session->msg("d", $errors);
       redirect('lectura.php',false);
   }

 }

?>


<?php include_once('layouts/header.php'); ?>

   
<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Carga Inicial de lectura</span>
         </strong>
       
        </div>
          
          
<!--Inicio formulario principal-->       
   <form name="lectura_form" method="post" action="" class="clearfix"> 
    <div class="form-row">
 	<div class="form-group col-md-4">
           <label for="caja_busqueda">Buscar cuenta:</label>
         <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
        </div>    
            
        
        <div class="form-group col-md-8">
        <label for="nombre_cli_f">Cliente</label>
        <input type="text" name="nombre_cli_f" id="nombre_cli_f" class="form-control"  readonly />		
        </div>
     
     </div>
     
     
     <div class="form-row">
     <div class="form-group col-md-6">
      <label for="lect_ant_f">Lectura Anterior</label>
      <input type="lect_ant_f" name="lect_ant_f" class="form-control" id="lect_ant_f" readonly value="0">
    </div>
     
     <div class="form-group col-md-6">
      <label for="lect_act_f">Lectura Actual</label>
      <input type="number" name="lect_act_f" class="form-control" id="lect_act" autofocus required>
    </div>
           </div>
     
     
      <div class="form-row">
 	<div class="form-group col-md-3">
      <label for="mes_ini_f">Mes inicial</label>
      <select id='mes' name='mes' class="textbox" style="width:165px;" required >
									<option value=''>-Seleccione Mes</option>
									<option value='01'> 1-Enero</option>
									<option value='02'> 2-Febrero</option>
									<option value='03'> 3-Marzo</option>
									<option value='04'> 4-Abril</option>
									<option value='05'> 5-Mayo</option>
									<option value='06'> 6-Junio</option>
									<option value='07'> 7-Julio</option>
									<option value='08'> 8-Agosto</option>
									<option value='09'> 9-Septiembre</option>
									<option value='10'>10-Octubre</option>
									<option value='11'>11-Noviembre</option>
									<option value='12'>12-Diciembre</option>
								</select>
      
      
          
      
      
       </div>
      <div class="form-group col-md-2">
          <label for="annio_ini_f">Año inicial</label>
          <?php
										$anio_1 = date('Y', strtotime('-1 year'));
										$anio_2 = date('Y', strtotime('-2 year'));
										$anio_3 = date('Y', strtotime('-3 year'));
										$anio_4 = date('Y', strtotime('-4 year'));
										$anio_5 = date('Y', strtotime('-5 year'));
										$anio_6 = date('Y', strtotime('-6 year'));
										$anio_7 = date('Y', strtotime('-7 year'));
										$anio_8 = date('Y', strtotime('-8 year'));
										$anio_9 = date('Y', strtotime('-9 year'));
										
									?>
									<select name="anio" class="textbox" style="width:75px;" required >
										<option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
										<option value="<?php echo $anio_1;?>"><?php echo $anio_1;?></option>
										<option value="<?php echo $anio_2;?>"><?php echo $anio_2;?></option>
										<option value="<?php echo $anio_3;?>"><?php echo $anio_3;?></option>
										<option value="<?php echo $anio_4;?>"><?php echo $anio_4;?></option>
										<option value="<?php echo $anio_5;?>"><?php echo $anio_5;?></option>
										<option value="<?php echo $anio_6;?>"><?php echo $anio_6;?></option>
										<option value="<?php echo $anio_7;?>"><?php echo $anio_7;?></option>
										<option value="<?php echo $anio_8;?>"><?php echo $anio_8;?></option>
										<option value="<?php echo $anio_9;?>"><?php echo $anio_9;?></option>
									</select>
      
          
          
          
          
          
      </div>
      <div class="form-group col-md-7">
      <label for="cod_usuario_f">Usuario:</label>
      <input type="text" name="cod_usuario_f" class="form-control" id="cod_usuario_f" readonly>
    </div>
     </div>
    
    
    <div class="form-row">
      <div class="form-group col-md-6" align="left">
      <input type="submit" name="add_lectura" id="submit" value="Guardar" class="btn btn-primary">
      </div>
        <div class="form-group col-md-6" align="right">
            <a href="lectura.php" class="btn btn-primary">Regresar</a>
      </div>
      
       </div>
 </form>  
  </div>      
               
<!--Fin formulario principal-->
 </div>
</div>
  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript">
	
		
     <script type="text/javascript" src="libs/js/jquery.js"></script>
 <script type="text/javascript" src="libs/js/main.js"></script>
   <?php include_once('layouts/footer.php'); ?>