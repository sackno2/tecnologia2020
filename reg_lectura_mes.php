<?php
  $page_title = 'Ingreso de Lecturas Mensual';
  require_once('includes/load.php');
  //require_once('includes/mes_letras.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
//$lec_cliente = find_by_id2('inv_cliente',(int)$_GET['id']); 
$lectura = join_lecturas_table_lista();
?>
<?php
//Consultas de fechas anterior y Calculo de fecha proxima para lectura


$fech_lectura = busq_ultima_fecha();
$fecha_ultima ="";
$ultimo_mes="";
$ultimo_anio="";
//$mes_ultimo_letra="";


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
  $lectura = join_lecturas_table();
   $cliente= join_inv_cliente_table();
 ?>   




<?php 


 if(isset($_POST['guardar'])){
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
       // no se permite la misma lectura inicial para la cuenta y mes y año
        $query_cta = "SELECT * FROM lecturas WHERE num_cuenta='$li_numcuenta'";
        $resul_cta = $db->query($query_cta);
        if($resul_cta->num_rows >= 1){    
        
                //if($db->query($query_cta)){
                $session->msg('d',"La Carga Inicial de Lectura para la cuenta ya fue agregada anteriormente".$num_cuenta);
                 //mysql_free_result($query_cta);
                redirect('reg_ini_lec1.php', false);
                }
                else
                {
                //efectua registro inicial de lectura, marca el recibo
                $query  = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,lectura_anterior, lectura_actual, consumo, user, cobro ) VALUES ('{$li_numcuenta}','{$li_mes}','{$li_anio}','{$li_fecha_lect}','{$li_lec_ant}', '{$li_lec_act}','{$li_consumo}', '{$li_user}', '{$li_cobro}')";
                if($db->query($query)){
                     $session->msg('s',"Lectura inical agregada exitosamente.".$num_cuenta);
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
            <span>REGISTRO MENSUAL DE LECTURAS</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
 <form method="post" action="reg_lectura.php" class="clearfix"> 
 
 
     <div class="form-row">
         
         <div class="form-group col-md-4">
         <label for="user_lect">Usuario</label>
         <?php  if ($session->isUserLoggedIn(true)); ?>  
         <input type="user_lect" name="user_lect" class="form-control" id="user_lect" value="<?php echo remove_junk(ucfirst($user['name']));?>" readonly>
        </div>
         
         
 	<div class="form-group col-md-6">
      <label for="mes_ini">Mes</label>
      <select id="mes_ini" name="mes"  class="form-control">
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
        <label for="anio">Año</label>
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
	<select name="anio_ini" class="form-control" onchange="mostrarInfo()" required >
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
         </div>
          
         
     <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 6%;">#</th>
                <th class="text-center" style="width: 7%;"> Mes</th> 
                <th class="text-center" style="width: 7%;"> Año</th> 
                <th class="text-center" style="width: 20%;"> Nombres</th>
                <th class="text-center" style="width: 20%;"> Apellidos</th>
                <th class="text-center" style="width: 10%;"> Cuenta </th>
                <th class="text-center" style="width: 15%;"> Lectura Anterior</th>
                <th class="text-center" style="width: 15%;"> Lectura Actual</th>
                </tr>
      </table>
       <!--Dentro del div se mostrara las cuentas filtradas
	<div   width="85%" height="300"></div>-->
	<div id="datos" align="center" style="width: 85%; height: 210px; overflow-x:auto; overflow-y:auto; border: 1px solid #CED8F6;" class="tabla_color"></div>
		
        
        
        
        
	<div class="row">
            <div class="form-group col-md-4" align="center">
            <input type="submit" name="reg_lectura" id="submit" value="Guardar" class="btn btn-primary">
            </div>
            <div class="form-group col-md-4" align="right">
            <input type="submit" name="submit3" id="submit3" value="Nuevo Ingreso" class="btn btn-primary">
            </div>
            <div class="form-group col-md-4" align="right">
            <input type="submit" name="submit3" id="submit3" value="Regresar" class="btn btn-primary">
            </div>
        </div>					     
 </form>
     
 <table align="center" width="85%" height="70" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
    <tr>
    <td align="center">
    <!--AGREGAR LOS DATOS A LA TABLA -->
    <?php
    //if ( $_REQUEST['reg_lectura'] == "Guardar" )
    if(isset($_POST['reg_lectura']))	
    {
	$nn= 0;
	//calcular el ultimo dia del mes para fecha lectura
	function getUltimoDiaMes($elAnio,$elMes) {
	return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
	}
	while($nn < $_POST["n"])
            {
            $nn=$nn+1;
            $num_cuenta = $_POST["num_cuenta$nn"];
            $empleado = $_POST["empleado"];  
            $mes = $_POST["mes"];  
            $anio = $_POST["anio"]; 
            $lectura_anterior = $_POST["lectura_anterior$nn"];  
            $lectura_actual = $_POST["lectura_actual$nn"];
            $consumo = $lectura_actual - $lectura_anterior;
            //Ejemplo de uso ultimo dia
            $ultimoDia = getUltimoDiaMes($anio,$mes);
            $fecha_lectura = $anio.'-'.$mes.'-'.$ultimoDia;
            //comprobar que no se ingrese mes actual o futuro
            if ($mes >= date('m'))
		{
		$mensaje = 'MES';		
		}
		else
                    {	
                    //comprobar si mes a ingresar no se ha registrado
                    $consulta_mes = mysqli_query($server, "SELECT mes,anio,cod_cuenta FROM lectura WHERE mes='$mes' AND anio='$anio' AND cod_cuenta='$cod_cuenta' AND cobro!='OS'");
                    if($row_mes = mysqli_fetch_array($consulta_mes))
                        {									
                        $mensaje = 'EXISTE';		
			}
			else
                            {
                            if(mysqli_query($server, "INSERT INTO lectura (cod_cuenta,lectura_actual,lectura_anterior,cod_empleado,mes,anio,fecha_lectura,consumo)
                            VALUES('$cod_cuenta','$lectura_actual','$lectura_anterior','$empleado','$mes','$anio','$fecha_lectura','$consumo')"))
                            	{ 
				$mensaje = 'OK';	
				}
				else
                                    {
                                    $mensaje = 'ERROR';	
                                    }
                            }
                    }
            }
	//MENSAJES
	if($mensaje == 'EXISTE')
            {
            echo '
		<center>
		<img src="../images/ico/Stop.png" width="25" height="25"><br>
		<font color="red">!Las lecturas para Mes seleccionado ya fueron ingresadas para este Bloque.!</font>
		</center>';
		}
		else if($mensaje == 'ERROR') 
                    {	
                    echo '
                    	<center>
                        <img src="../images/ico/Error.png" width="32" height="32"><br>
			<font color="red">! <b>Error</b>, datos No guardados, verifique por favor !</font>
			</center>'.mysqli_error();
			$error = mysqli_errno();	
			echo msg_error($error);
			}
			else if($mensaje == 'OK') 
                            {	
                            echo '
                                <center>
				<img src="../images/ico/OK.png" width="25" height="25"><br>
				<font color="green">!Lecturas agregadas con &eacute;xisto.!</font>
				</center>';
				}		
				else if($mensaje == 'MES') 
                                    {
                                    echo ' 
                                    <center>
                                    <img src="../images/ico/Stop.png" width="32" height="32"><br>
                                    <font color="red">!Los meses futuros o el actual NO pueden ser ingresados!</font>
                                    </center>';
                                    }
	}
	else
            {
            echo '
            <img src="../images/ico/info.png" width="25" height="25"><br>
            <font color="blue">!Todos los campos son obligatorios!</font>';
            }//fin bloque scrip guardar
            ?>
	</td>
	</tr>
	</table>	
			
     
     
<div class="form-row">
<div class="form-group col-md-4">
<label for="num_cuenta">Código de cuenta</label>
<input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($lec_cliente['num_cuenta']);?>" readonly>
</div>
         
<div class="form-group col-md-4">
<label for="nombres_rec">Nombres</label>
<input type="text" name="nombres_rec" class="form-control" placeholder="nombres_rec" value="<?php echo remove_junk($lec_cliente['nombre']);?>" readonly >  
</div>  
  
<div class="form-group col-md-4">
<label for="apellidos_rec">Apellidos</label>
<input type="text" name="apellidos_rec" class="form-control" id="apellido_rec" value="<?php echo remove_junk($lec_cliente['apellido']);?>"  readonly>
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
  
     
       
       
 
 
          
   
            
            
            
            
            
  
 
  

 
         </div>
        </div>
      </div>
  </div>

<script type="text/javascript" src="libs/js/jquery.js"></script>
<script type="text/javascript" src="libs/js/datos_lectura.js"></script>



<?php include_once('layouts/footer.php'); ?>