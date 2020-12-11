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
            <span>Validacion de Lecturas</span>
         </strong>
         <div class="pull-right">
           <a href="lectura.php" class="btn btn-primary">Regresar</a>
           
         </div>
        </div>
          
          <div class="form-group">
         <label for="user_lect">Usuario:</label> <?php  if ($session->isUserLoggedIn(true)); ?>  
         <input type="user_lect" name="user_lect" class="form-control" id="user_lect" value="<?php echo remove_junk(ucfirst($user['name']));?>" readonly>
         <?phpecho remove_junk(ucfirst($user['name']));?>
        </div>
<!--tabla-->
<div class="panel-body">
           
  <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 4%;">#</th>
                <th class="text-center" style="width: 7%;"> Mes</th> 
                <th class="text-center" style="width: 6%;"> Año</th> 
                <th class="text-center" style="width: 20%;"> Nombres</th>
                <th class="text-center" style="width: 20%;"> Apellidos</th>
                <th class="text-center" style="width: 7%;"> Cuenta </th>
                <th class="text-center" style="width: 10%;"> Lectura Anterior</th>
                <th class="text-center" style="width: 10%;"> Lectura Actual</th>
                <th class="text-center" style="width: 10%;"> Consumo</th>
                <th class="text-center" style="width: 10%;"> Validar</th>
                </tr>
        </thead>
        <tbody>
	<tr>
                <?php
					 
		$query2 = "SELECT inv_cliente.nombre,inv_cliente.apellido,inv_cliente.num_cuenta,lecturas.cod_lectura,lecturas.num_cuenta,lecturas.lectura_anterior,lecturas.lectura_actual,lecturas.consumo,lecturas.mes,lecturas.anio FROM inv_cliente,lecturas WHERE (lecturas.num_cuenta=inv_cliente.num_cuenta) AND lecturas.mes='$ultimo_mes' AND lecturas.anio='$ultimo_anio' AND lecturas.consumo<0 AND lecturas.cobro !='c' ORDER BY lecturas.mes ASC";
		//$rs = mysqli_query($server, $query2);
                $resultado= $db->query($query2);
                
		//$row = mysqli_fetch_array($resultado); 
                $registros= mysqli_num_rows($resultado);
                
                if ($registros=0){
                    $session->msg('s',"No hay lecturas para validar. ");
                }
               else{   
                     echo '<table  class="table table-bordered">';
			$num_fila = 0;
                        $n=0;
							while ($row = mysqli_fetch_array($resultado))
                                                                {
									$n=$n+1;
									//$bgcolor1 = " '#CED8F6' "; // color sobre seleccion 
									//$bgcolor2 = " '#ffffff' ";// color original blanco 
									//$bgcolor3 = " '#EEE9FD' ";// color original 2
										
								
															
									echo"<tr>
									<input type='hidden' value='".$row['cod_lectura']."'> 
									<td width='4%' aling='center'>$n</td>
									<td width='7%'aling='center'>".mes_letras($row['mes'])."</td>
                                                                        <td width='6%'>".$row['anio']."</td>
									<td Width='20%'>".$row['nombre']."</td>
                                                                        <td Width='20%'>".$row['apellido']."</td>
									<td Width='7%'>".$row['num_cuenta']."</td>
									<td Width='10%'>".$row['lectura_anterior']."</td>
									<td Width='10%'>".$row['lectura_actual']."</td>
									<td Width='10%'>".$row['consumo']."</td>
									
									<td Width='10%' align='center'>&nbsp;<a href='val_lectura_ind.php?id=".$row['cod_lectura']."&num_cuenta=".$row['num_cuenta']."' title='Validar' class='btn btn-info btn-xs'data-toggle='tooltip'></a></td>
                                                                            
									
								
								</tr>";
								$num_fila++; 
								}
                }
								?>
						
						</table>
						</div>
						
							
	<?php include_once('layouts/footer.php'); ?>


