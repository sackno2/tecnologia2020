<?php
  $page_title = 'Lecturas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
//$rec_cliente = find_by_id2('inv_cliente',(int)$_GET['id']); 
$lec_cuenta = find_by_cta('inv_cliente',(int)$_GET['id']);
$reg_lectura = lecturas_table();


//if(!$rec_cliente){
 // $session->msg("d","Cliente no encontrado por Codigo.",$rec_cliente);
 // redirect('reg_lectura.php');
//}
?>

<?php 


 if(isset($_POST['reg_lectura'])){
     echo $_POST['num_cuenta'];
     
    $req_fields = array('num_cuenta','mes_ini','anio_ini','lec_ant_li','lec_act_li','user_lect');
    validate_fields($req_fields);
    if(empty($errors)){
        $li_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
        $li_mes   = remove_junk($db->escape($_POST['mes_ini']));
        $li_anio   = remove_junk($db->escape($_POST['anio_ini']));
        //calcular el ultimo dia del mes para fecha lectura
        function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
        }
        //Ejemplo de uso ultimo dia
        $ultimoDia = getUltimoDiaMes(($_POST['anio_ini']),($_POST['mes_ini']));
        $li_fecha_lect = ($_POST['anio_ini']).'-'.($_POST['mes_ini']).'-'.$ultimoDia;	
        
        //$li_fecha_lect = $li_anio.'-'.$li_mes.'-'.$ultimoDia;	
        //$li_fecha_lect  = remove_junk($db->escape($_POST['fecha_lect_li']));
        $li_lec_ant  = remove_junk($db->escape($_POST['lec_ant_li']));
        $li_lec_act  = remove_junk($db->escape($_POST['lec_act_li']));
        //$li_consumo =  $li_lec_act - $li_lec_ant;
        $li_consumo = ($_POST['lec_act_li'])-($_POST['lec_ant_li']);
        $li_user  = remove_junk($db->escape($_POST['user_lect']));
        if (($_POST['lec_ant_li'])>($_POST['lec_act_li'])) {
            $li_cobro = 'v';
            } else {
              $li_cobro = 'c';
              }
        //no se permite la misma lectura inicial para la cuenta y mes y año
        //$query_cta = "SELECT * FROM lecturas WHERE num_cuenta='$li_numcuenta'and anio='$li_anio' and mes='$li_mes'";
        //if($db->query($query_cta)){
          // $session->msg('s',"La Carga Inicial de Lectura para la cuenta ya fue agregada");
           //redirect('reg_ini_lec1.php', false);
           //}
            //else
            //{
            //efectua registro inicial de lectura, marca el recibo
            $query  = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,lectura_anterior, lectura_actual, consumo, id_use, cobro ) VALUES ('{$li_numcuenta}','{$li_mes}','{$li_anio}','{$li_fecha_lect}','{$li_lec_ant}', '{$li_lec_act}','{$li_consumo}', '{$li_user}', '{$li_cobro}')";
            if($db->query($query)){
               $session->msg('s',"Lectura inical agregada exitosamente. ");
               redirect('reg_ini_lec1.php', false);
             } else {
               $session->msg('d',' Lo siento, registro falló.');
               redirect('reg_lectura.php', false);
               } 
               }
    } else {
                    $session->msg("d", $errors);
                    redirect('reg_ini_lec1.php',false);
                    }
//}
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
            <span>REGISTRO INICIAL DE LECTURA</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
 <form method="post" action="reg_lectura.php" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="num_cuenta">Código de cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($rec_cliente['num_cuenta']);?>" readonly>
    </div>
         
     <div class="form-group col-md-4">
    <label for="nombres_rec">Nombres</label>
    <input type="text" name="nombres_rec" class="form-control" placeholder="nombres_rec" value="<?php echo remove_junk($rec_cliente['nombre']);?>" readonly >  
  </div>  
  
  <div class="form-group col-md-4">
      <label for="apellidos_rec">Apellidos</label>
      <input type="text" name="apellidos_rec" class="form-control" id="apellido_rec" value="<?php echo remove_junk($rec_cliente['apellido']);?>"  readonly>
    </div>
   </div>
       
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="lec_ant_li">Lectura anterior</label>
    <input type="number" name="lec_ant_li" class="form-control" min="0" value="0" >  
  </div>  
  
  <div class="form-group col-md-6">
    <label for="lec_act_li">Lectura actual</label>
    <input type="number" name="lec_act_li" class="form-control" min="1" >  
  </div>  
 
  </div>
   <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="mes_ini">Mes Inicial</label>
      <select id="mes_ini" name="mes_ini" class="form-control">
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
        <label for="anio_ini">Año Inicial</label>
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
	<select name="anio_ini" class="textbox" style="width:75px;" required >
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
     
       <div class="form-group col-md-4">
      <label for="user_lect">Usuario</label>
     <?php  if ($session->isUserLoggedIn(true)); ?>  
     <input type="user_lect" name="user_lect" class="form-control" id="user_lect" value="<?php echo remove_junk(ucfirst($user['name']));?>" readonly>
   
        
  </div>
       
 </div>
 
  
 
  <div class="row">
            <div class="form-group col-md-6" align="center">
      <input type="submit" name="reg_lectura" id="submit" value="Guardar" class="btn btn-primary">
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





<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

