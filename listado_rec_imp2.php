<?php
   $page_title = 'Listado de recibos';
  //require_once('config.php');
  require_once('includes/load.php');
   error_reporting(0);
?>
 
<?php
//Cambia la fecha : yyyy-mm-dd >>> d-mm-yyyy
function fecha_guion($fecha){ 
    $objeto_DateTime = date_create_from_format('Y-m-d',$fecha);	
	$cadena_nuevo_formato = date_format($objeto_DateTime, "d/m/Y");	
    return $cadena_nuevo_formato; 
} 
?>




<?php		
//$mes=$_POST['mes'];//agregado
//$anio=$_POST['anio'];//agregado
 
$mes='1';
$anio='2020';
$nfilas=0;

 //Consulta recibos por mes y año
 //$consultar = mysqli_query($server, "SELECT * FROM cuenta WHERE cod_bloque='$filtro' ORDER BY cod_cliente ASC");
 $consultar = "SELECT * FROM recibos WHERE mes='$mes' and anio= '$anio' ORDER BY num_cuenta ASC";
 $result_consultar= $db->query($consultar);
 $nfilas = mysqli_num_rows($result_consultar);	
 echo $nfilas;
  
  //Imprime en otra pagina
  //echo'<body onload=window.print(); window.close();>';
 //Verifica que haya recibos
 if($nfilas!=0)
    {
    $num_fila = 0;
    $n=0;
    while($Datos = mysqli_fetch_array($result_consultar))
	{
        ?>  

<table font-size='6pt' border="0" align="center" cellspacing="1">
        <?php $n=$n+1;
        //Consulta cliente por cuenta mes y año
        //$consultarcliente = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND mes='$mes' AND anio='$anio' AND anulado='NO' AND estado='Activo'");
	$consultarcliente = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND mes='$mes' AND anio='$anio' AND anulado='NO' AND estado='Activo'";
	//$consultarcliente = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND mes='1' AND anio='2020' AND anulado='NO' AND estado='Activo'";
        $result_cliente= $db->query($consultarcliente);
        $DatosCliente = mysqli_fetch_array($result_cliente); ?>
            <tr>  
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>      
                    <td></td> 
            </tr>
            
             <?php      
                    $ConsultarNombreCliente = "SELECT * FROM inv_cliente where num_cuenta='$DatosCliente[num_cuenta]'";
                    $result_consultanombre= $db->query($ConsultarNombreCliente);
                    $DatosNombreCliente = mysqli_fetch_array($result_consultanombre);
		
                    //$ConsultarMostrarNombreCliente = mysqli_query($server, "SELECT * FROM inv_cliente where cod_cliente='$DatosNombreCliente[cod_cliente]'");
                    $ConsultarMostrarNombreCliente = "SELECT * FROM inv_cliente where num_cuenta='$DatosNombreCliente[num_cuenta]'";
                    $result_mostrarNombre= $db->query($ConsultarMostrarNombreCliente);
                    $DatosMostrarNombreCliente = mysqli_fetch_array($result_mostrarNombre);
		?>
            
            <tr>
                
                <td colspan=3> <b>Usuario:</b><i><?php echo $DatosMostrarNombreCliente[nombre]. $DatosMostrarNombreCliente[apellido]?></i></td>								
  
                    <td></td>
                    
                    <td colspan=3> Usuario: <?php echo $DatosMostrarNombreCliente[nombre]. $DatosMostrarNombreCliente[apellido]?></td>								
                    <td></td>
            </tr>
                    
             <tr>
                    
                    <td colspan=3> Número de recibo: <?php echo$DatosCliente[num_recibo]?></td>
                    <td></td>
                    
                    <td colspan=3> Número de recibo: <?php echo$DatosCliente[num_recibo]?></td>
                    <td></td>
                    
              </tr>       
             
              <tr>
                   
                    <td colspan=3> Número de cuenta: <?php echo$DatosCliente[num_cuenta]?></td>							
                    <td></td>
                    <td colspan=3> Número de cuenta: <?php echo$DatosCliente[num_cuenta]?></td>
                    <td></td>									
                    </tr>
                    
                    
                    
                   <?php
                    $consultarlectura = "SELECT * FROM lecturas where num_cuenta='$DatosCliente[num_cuenta]' AND mes='$mes' AND anio='$anio' AND cobro!='v'";
                    //$consultarlectura= "SELECT * FROM lecturas where num_cuenta='123' AND mes='1' AND anio='2020' AND cobro!='v'";
                    $result_consultarlectura= $db->query($consultarlectura);
                    $nfilas_lect = mysqli_num_rows($result_consultar);	
                    $DatosLectura = mysqli_fetch_array($result_consultarlectura);
                ?>
		<tr>
                    <td> Lectura Actual(m3): <?php echo$DatosLectura[lectura_actual]?></td>					
                    <td> Lectura Anterior(m3): <?php echo$DatosLectura[lectura_anterior]?></td>								
                    <td> Consumo mensual(m3): <?php echo$DatosLectura[consumo]?></td>								
                    <td> Fecha de lectura: <?php echo fecha_guion($DatosLectura[fecha_lectura])?> </td>							
                    <td> Lectura actual(m3): <?php echo$DatosLectura[lectura_actual]?></td>			
                    <td> Lectura anterior(m3): <?php echo $DatosLectura[lectura_anterior]?></td>							
                    <td> Consumo mensual(m3): <?php echo $DatosLectura[consumo]?></td>					
                    <td> Fecha de lectura: <?php echo fecha_guion($DatosLectura[fecha_lectura])?></td>			
                 </tr>
                    
                    <tr>
                     
                    <td> 001</td>								
                    <td> Servicio de Agua </td>
                    <td></td >
                    <td> <?php echo$DatosCliente[monto]?></td>								
                    <td> 001</td>								
                    <td> Servicio de Agua </td>	
                    <td></td >
                    <td> <?php echo $DatosCliente[monto]?> </td>								
                    </tr>
                    
                    <?php 
                    $saldo=0.00;
                    //$consultarmora = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND pagado='NO' AND mes!='$mes' ");
                    $consultarmora = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND pagado='NO' AND mes!='$mes'";
                    $result_consultarmora= $db->query($consultarmora);
                
                    while($DatosMora = mysqli_fetch_array($result_consultarmora))
                        {
                        $saldo= $saldo + $DatosMora["monto"] + $DatosMora["recargo"];
                        }			
               
                      ?> 
                    
                    
                   <?php 
                    $saldo=0.00;
                    //$consultarmora = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND pagado='NO' AND mes!='$mes' ");
                    $consultarmora = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND pagado='NO' AND mes!='$mes'";
                    $result_consultarmora= $db->query($consultarmora);
                
                    while($DatosMora = mysqli_fetch_array($result_consultarmora))
                        {
                        $saldo= $saldo + $DatosMora["monto"] + $DatosMora["recargo"];
                        }			
               
                      ?>  
                     <tr>
                        <td> 002</td>		
                        <td> Saldo Pendiente</td>
                        <td></td >
                        <td> <?php echo $saldo?></td>
                        <td> 002</td>		
                        <td> Saldo Pendiente</td>
                        <td></td>
                        <td><?php echo $saldo?></td>
                     </tr>
                     
                      
                    <?php
                    //$consultarrecargo = mysqli_query($server, "SELECT * FROM recargo");
                    $consultarrecargo = "SELECT * FROM recargo";
                    $result_consultarrecargo= $db->query($consultarrecargo);
                
                    $DatosRecargo = mysqli_fetch_array($result_consultarrecargo);
                    $recargo = $DatosRecargo["monto"] + $DatosCliente["monto"];
                    $total = $DatosCliente["monto"] + $saldo;
		?>
                     <tr>
                    <td></td>		
                    <td>Total</td>
                    <td></td>
                    <td><?php echo $total?></td>
                    <td> </td>		
                    <td>Total</td >
                    <td></td >
                    <td><?php echo $total?></td>
                    </tr>
                    
                    <tr>
                   
                    <td colspan=3>Ultima fecha de pago:  </td>
                    <td> <?php echo fecha_guion($DatosCliente[fecha_pago])?></td>								
                    <td colspan=3> Ultima fecha de pago: </td>					
                    <td><?php echo fecha_guion($DatosCliente[fecha_pago])?></td>								
                    </tr>
                  
                    </table>
              <input type='hidden' name='num_cuenta$n' value='$Datos[num_cuenta]'>
                    <input type='hidden' name='cod_lectura$n' value='$DatosConsumo[cod_lectura]'>
                    <input type='hidden' name='tarifa$n' value='$tarifa_ok[precio]'>
                    <input type='hidden' name='n' value='$n'>
        <?php 
        $num_fila++; 
                    if($n==1){
                    ?>
                    
                    <?php
                    $n=0;
                    }
        }
    }
     mysqli_close(); ?>
<?php
 $content = ob_get_clean();
 //$content= ob_clean();
 require_once('html2pdf/html2pdf.class.php');
 try {
$pdf = new HTML2PDF('L','letter','es','UTF-8');//L y P*/
 $pdf->pdf->SetDisplayMode('fullpage');
 ob_clean();
 $pdf -> writeHTML($content);
 $pdf -> pdf ->IncludeJS('print(TRUE)');
 $pdf -> output('recibos.pdf');
 
 }
 catch(HTML2PDF_exception $e) {
       echo $e;
     exit;
   }
    
   
    
?>	
	  

    
 
            
            
