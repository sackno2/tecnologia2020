<?php
   $page_title = 'Listado de Lectura';
  //require_once('config.php');
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(2);
  $sql  =("SELECT * FROM inv_servicio");
  $servicio=$db->query($sql);
  $rowgeneral = mysqli_fetch_array($servicio); 
// Deshabilitar todo reporte de errores
//error_reporting(0);  
  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1); 
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
?>
 
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



 

<page>
 <h3 align="center">Listado de toma de lecturas</h3>
 <table width="621" border="0" align="center" cellspacing="1">
  <tr>
    <td width="100">Mes:<?php echo $proximo_mes_letra;?></td>
    <td width="100">Año:<?php echo $proximo_anio; ?></td>
    <td width="300">Fecha de toma de lectura:<?php echo date('Y-m-d'); ?></td> 
  </tr>  
</table>

 <table class="table table-bordered" border="1" align="center" cellpadding="3" >
            <thead>
              <tr>
                <th class="text-center" style="width: 4%;">#</th>
                <th class="text-center" style="width: 20%;"> Nombres</th>
                <th class="text-center" style="width: 20%;"> Apellidos</th>
                <th class="text-center" style="width: 10%;"> Cuenta </th>
                <th class="text-center" style="width: 15%;"> Lectura Anterior</th>
                <th class="text-center" style="width: 15%;"> Lectura Actual</th>
              </tr>
            </thead> 
            <tbody>
              <?php foreach ($cliente as $clientes):?>    
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($clientes['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientes['apellido']); ?></td>
                <td class="text-center" align="center"> <?php echo remove_junk($clientes['num_cuenta']); ?></td>
                <input type='hidden' name='num_cuenta' value='<?php echo remove_junk($clientes['num_cuenta']); ?>'>
                 
                <?php $n_cta= remove_junk($clientes['num_cuenta']);
                      $dato_cta= find_by_cta_mes_an('lecturas',$n_cta,$ultimo_mes,$ultimo_anio); ?>
                <td class="text-center" align="center"> <?php echo remove_junk($dato_cta['lectura_actual']); ?></td>

                 <input type='hidden' name='lectura_anterior' value='<?php echo remove_junk($dato_cta['lectura_actual']); ?>'>
                    <td>
                    </td>
                </tr>
             
                <?php endforeach; ?>
              </tbody>
              </table>	

 </page> 