<?php
  $page_title = 'Ingreso de Lecturas Mensual';
  require_once('includes/load.php');
  //require_once('includes/mes_letras.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $lectura = join_lecturas_table();
   $cliente= join_inv_cliente_table();
?>

<?php
//Consultas de fechas anterior y Calculo de fecha proxima para lectura
$fech_lectura = busq_ultima_fecha();
$fecha_ultima ="";
$ultimo_mes="";
$ultimo_anio="";
?>
 
<?php
function mes_letras($mes)
 {
    switch($mes) 
   {
      case "1":
         $month = "Enero";
         break;
      case "2":
         $month = "Febrero";
         break;
      case "3":
         $month = "Marzo";
         break;
      case "4":
         $month = "Abril";
         break;
      case "5":
         $month = "Mayo";
         break;
      case "6":
         $month = "Junio";
         break;
      case "7":
         $month = "Julio";
         break;
      case "8":
         $month = "Agosto";
         break;
      case "9":
         $month = "Septiembre";
         break;
      case "10":
         $month = "Octubre";
         break;
      case "11":
         $month = "Noviembre";
         break;
      case "12":
         $month = "Diciembre";
         break;
   }
   
   return $month;
}

?>

<?php
	//calcular el ultimo dia del mes para fecha lectura
            function getUltimoDiaMes($elAnio,$elMes) {
            return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
            }
?>
              
<?php foreach ($fech_lectura as $fechas_lect):?>
<?php 
//obtniendo la ultima fecha
$fecha_ultima= remove_junk($fechas_lect['ultima_fecha']);
$fecha_ultima_f= date("Y-m-d", strtotime("$fecha_ultima"));
$ultimo_mes=date("n",strtotime($fecha_ultima_f));
$ultimo_anio=date("Y",strtotime($fecha_ultima_f));
 ?>
<?php endforeach; ?>

 
<?php
//Caluculando nueva fecha para lectura
$proxima_fecha = strtotime($fecha_ultima."+ 1 days");
//echo date("Y-m-d",$proxima_fecha) . "\n";
$proximo_mes=date("n",$proxima_fecha);
//echo $proximo_mes;
$proximo_anio=date("Y",$proxima_fecha);
//echo $proximo_anio;
$proximo_mes_letra= mes_letras("$proximo_mes");
//echo $proximo_mes_letra; 
    //$session->msg('d',"No existen registros de lectura, debe iniciarlizas");
  
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
            <span>Registro Mensual de Lecturas</span>
         </strong>
        </div>
        
            <div class="panel-body">
            <div class="col-md-12">
         
             
             
 <!--Inicio formulario principal-->       
 <form method="post" action="reg_lectura_mes2.php" class="clearfix"> 
 <div class="row">
     <div class="col-md-12">
          <label for="user_lect">Usuario</label>
         <input type="user_lect" name="user_lect" class="form-control" id="user_lect" value="<?php echo remove_junk(ucfirst($user['name']));?>" readonly>
        </div>
      </div>
  <div class="row">
     <div class="col-md-12">       
     <table class="table table-bordered">
            
              <tr>
                <th class="text-center" style="width: 4%;">#</th>
                <th class="text-center" style="width: 9%;"> Mes</th> 
                <th class="text-center" style="width: 7%;"> Año</th> 
                <th class="text-center" style="width: 20%;"> Nombres</th>
                <th class="text-center" style="width: 20%;"> Apellidos</th>
                <th class="text-center" style="width: 10%;"> Cuenta </th>
                <th class="text-center" style="width: 15%;"> Lectura Anterior</th>
                <th class="text-center" style="width: 15%;"> Lectura Actual</th>
                </tr>
                <?php $n=0;?>
                <?php foreach ($cliente as $clientes):?>
                
                
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo $proximo_mes_letra  ?></td>
                <td class="text-center"> <?php echo $proximo_anio; ?></td>
                <td class="text-center"> <?php echo remove_junk($clientes['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientes['apellido']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientes['num_cuenta']); ?></td>
                <input type='hidden' name='num_cuenta[]' value='<?php echo remove_junk($clientes['num_cuenta']); ?>'>
                 
                <?php $n_cta= remove_junk($clientes['num_cuenta']);
                      $dato_cta= find_by_cta_mes_an('lecturas',$n_cta,$ultimo_mes,$ultimo_anio); ?>
                <td class="text-center"> <?php echo remove_junk($dato_cta['lectura_actual']); ?></td>
                 <input type='hidden' name='lectura_anterior[]' value='<?php echo remove_junk($dato_cta['lectura_actual']); ?>'>
                <?phpecho remove_junk($dato_cta['lectura_actual']); ?>
                 <td width='20%'>
                    <input type='number' name='lectura_actual[]' min='1' maxlength='10' class='textbox' style='width:105px;' required >
                    
                     
                    </td>
                </tr>
                    
                <input type='hidden' name='n' value='$n'>
                    
                    
                    
              <?php $n= $n+1;?>
                      
                    
                    
               <?php endforeach; ?>
              
              </table>	
</div>
      </div>
            <div class="row">
            <div class="form-group col-md-6" align="left">
            <input type="submit" name="reg_lectura_mes2" id="submit" value="Guardar" class="btn btn-primary">
            </div>
            
            <div class="form-group col-md-6" align="right">
                <a href="lectura.php" class="btn btn-primary">Regresar</a>
           </div>
            </div>					     
    
        
 
    
 </form>
 </div>
     </div>
  <?php

        //if ( $_REQUEST['reg_lectura_mes2'] == "Guardar" )
        if(isset($_POST['reg_lectura_mes2']))
        { 
            
          
          
            //$nn= 0;
        
            //$req_fields = array('num_cuenta','lectura_anterior','lectura_actual','user_lect');
           // validate_fields($req_fields);
            
            //if(empty($errors)){
               //while($nn < $n)
                //$n=$registros; 
                
                   // while($nn < $_POST["n"]){
                  for ($i=0; $i<$n; $i++){  
                      //$nn=$nn+1;
                      $lm_numcuenta = $_POST['num_cuenta'];
                      $lm_mes   = $proximo_mes;
                      $lm_anio   = $proximo_anio;
                      $ultimoDia = getUltimoDiaMes($proximo_anio,$proximo_mes);
                      $lm_fecha_lect = $proximo_anio.'-'.$proximo_mes.'-'.$ultimoDia;
                      $lm_lec_ant  = $_POST['lectura_anterior']; 
                      $lm_lec_act  = $_POST['lectura_actual'];
                      $lm_user  = remove_junk($db->escape($_POST['user_lect']));
                      
                      $lm_consumo[$i] =  $lm_lec_act[$i] - $lm_lec_ant[$i];
                     // $lm_consumo[$nn] =  $lm_lec_act[$nn] - $lm_lec_ant[$nn];
                      
                        if ($lm_lec_ant[$i]>$lm_lec_act[$i]) {
                      //if ($lm_lec_ant[$nn]>$lm_lec_act[$nn]) {
                        $lm_cobro = 'v';
                        } else {
                        $lm_cobro = 'c';
                        }  
                              
                              //comprobar si mes a ingresar no se ha registrado
                            
                            
                            
                            //$query_cta = "SELECT * FROM lecturas WHERE num_cuenta='$lm_numcuenta[$i]'and anio='$lm_anio' and mes='$lm_mes'";
                            //if($db->query($query_cta)){
                            //$session->msg('s',"Las lecturas para el mes seleccionado ya fueron ingresadas");
                            //redirect('reg_lectura_mes2.php', false);
                            //}
                            //else
                            //{
                             //efectua registro de lectura, marca el recibo
                           $query  = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,lectura_anterior, lectura_actual, consumo, user, cobro ) VALUES ('{$lm_numcuenta[$i]}','{$lm_mes}','{$lm_anio}','{$lm_fecha_lect}','{$lm_lec_ant[$i]}', '{$lm_lec_act[$i]}','{$lm_consumo[$i]}', '{$lm_user}', '{$lm_cobro}')";
                           if ($db->query($query)){
                              $mensaje ='OK';
                          }else{
                              $mensaje='ERROR';
                          }
                          
                           }
                           
                           // else {
                           // $session->msg('d',' Lo siento, registro falló.');
                           // redirect('lectura.php', false); 
                           if ($mensaje=='OK'){				
                           $session->msg('s',"Lecturas agregadas exitosamente. ");
                           //redirect('reg_lectura_mes2.php', false);
                             }
                            else {
                                $session->msg("d", $errors);
                               // redirect('reg_lectura_mes2.php',false);
                            }
      }//fin bloque scrip guardar
      
      
?>          
     <div>
         
     
         </div>
             
 </div>
 </div>
      </div>
     
  
	<?php include_once('layouts/footer.php'); ?>
