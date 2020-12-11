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

<head>
			<!--estilo de la seleccion de los iconos (div)-->
						
			
			<!--Redondear bordes de tablas agregar con class="tabla_bordes"-->
				<style type="text/css">
				h1{
				page-break-before: always;
				}
				</style>
			<style>
				.formato{
					color: black;
					text-align: left;
					font-size: 10pt;
					font-face: sans-serif;
					
					}				
			</style>
			
			<style type="text/css"> 
					#global{
			   width:900px;
			}
			#uno{
				
			   width:100px;
			   float:left;
			   color: black;
			text-align: right;
			font-size: 10pt;
			font-face: sans-serif;
			}
			#dos{
			   margin-left:15px;
			   float:left;
			   width:100px;
			   color: black;
			text-align: center;
			font-size: 10pt;
			}
			#tres{
			   margin-left:15px;
			   float:left;
			   width:100px;
			   color: black;
			text-align: left;
			font-size: 10pt;
			}				
			#cuatro{
			   margin-left:15px;
			   color: black;
			   float:left;
			   width:100px;
			  
			text-align: right;
			font-size: 10pt;
			}		
			</STYLE>			

</head>

<page>
 
<?php		
 $mes=$_GET['mes'];//agregado
 $anio=$_GET['anio'];//agregado
 $nfilas=0;

 //Consulta recibos por mes y año
 //$consultar = mysqli_query($server, "SELECT * FROM cuenta WHERE cod_bloque='$filtro' ORDER BY cod_cliente ASC");
 $consultar = "SELECT * FROM recibos WHERE mes='$mes' and anio= '$anio' ORDER BY num_cuenta ASC";
 $result_consultar= $db->query($consultar);
 $nfilas = mysqli_num_rows($result_consultar);	
  
  //Imprime en otra pagina
  //echo'<body onload=window.print(); window.close();>';
 //Verifica que haya recibos
 if($nfilas!=0)
    {
    $num_fila = 0;
    $n=0;
    while($Datos = mysqli_fetch_array($result_consultar))
	{
        
        echo'<table class="table table-bordered" border="1" align="center" cellpadding="3">';
	$n=$n+1;
	//Consulta cliente por cuenta mes y año
        //$consultarcliente = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND mes='$mes' AND anio='$anio' AND anulado='NO' AND estado='Activo'");
	$consultarcliente = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND mes='$mes' AND anio='$anio' AND anulado='NO' AND estado='Activo'";
	//$consultarcliente = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND mes='1' AND anio='2020' AND anulado='NO' AND estado='Activo'";
        $result_cliente= $db->query($consultarcliente);
        $DatosCliente = mysqli_fetch_array($result_cliente);
	
        
	//echo  "'<tr>'"; 
		echo"
                    <tr>  
                    <td><br><br></td>
                    </tr>
                
                    <tr>
                    ";
                    $ConsultarNombreCliente = "SELECT * FROM inv_cliente where num_cuenta='$DatosCliente[num_cuenta]'";
                    $result_consultanombre= $db->query($ConsultarNombreCliente);
                    $DatosNombreCliente = mysqli_fetch_array($result_consultanombre);
		
                    //$ConsultarMostrarNombreCliente = mysqli_query($server, "SELECT * FROM inv_cliente where cod_cliente='$DatosNombreCliente[cod_cliente]'");
                    $ConsultarMostrarNombreCliente = "SELECT * FROM inv_cliente where num_cuenta='$DatosNombreCliente[num_cuenta]'";
                    $result_mostrarNombre= $db->query($ConsultarMostrarNombreCliente);
                    $DatosMostrarNombreCliente = mysqli_fetch_array($result_mostrarNombre);
		
                echo"
                    <td colspan=3> <div class='formato'>Usuario: ".$DatosMostrarNombreCliente[nombre]." ".$DatosMostrarNombreCliente[apellido]."</div></td>								
                    <td></td>
                    
                    <td colspan=3> <div class='formato'>Usuario: ".$DatosMostrarNombreCliente[nombre]." ".$DatosMostrarNombreCliente[apellido]."</div></td>								
                    <td></td>
                    
                    </tr>
                    
                    <tr>
                    ";
		echo"
                    <td colspan=3> <div class='formato'>Número de recibo: ".$DatosCliente[num_recibo]."</div></td>
                    <td></td>
                    
                    <td colspan=3> <div class='formato'>Número de recibo: ".$DatosCliente[num_recibo]."</div></td>
                    <td></td>
                   
                    </tr>
                    
                    <tr>
                    ";
		
		echo"
                    <td colspan=3> <div class='formato'>Número de cuenta: ".$DatosCliente[num_cuenta]."</div></td>							
                    <td></td>
                    <td colspan=3> <div class='formato'>Número de cuenta: ".$DatosCliente[num_cuenta]."</div></td>
                    <td></td>									
                    </tr>
                    
                    <tr>
                    ";
                    $consultarlectura = "SELECT * FROM lecturas where num_cuenta='$DatosCliente[num_cuenta]' AND mes='$mes' AND anio='$anio' AND cobro!='v'";
                    //$consultarlectura= "SELECT * FROM lecturas where num_cuenta='123' AND mes='1' AND anio='2020' AND cobro!='v'";
                    $result_consultarlectura= $db->query($consultarlectura);
                    $nfilas_lect = mysqli_num_rows($result_consultar);	
                    $DatosLectura = mysqli_fetch_array($result_consultarlectura);
                
		echo"  
                    
                    <td><div='global' id='tres'>Lectura Actual(m3): ".$DatosLectura[lectura_actual]."</div></td>					
                    <td><div='global' id='tres'>Lectura Anterior(m3): ".$DatosLectura[lectura_anterior]."</div></td>								
                    <td><div='global' id='tres'>Consumo mensual(m3): ".$DatosLectura[consumo]."</div></td>								
                    <td><div='global' id='tres'>Fecha de lectura: ".fecha_guion($DatosLectura[fecha_lectura])."</div></td>							
                    <td><div='global' id='tres'>Lectura actual(m3): ".$DatosLectura[lectura_actual]."</div></td>			
                    <td><div='global' id='tres'>Lectura anterior(m3): ".$DatosLectura[lectura_anterior]."</div></td>							
                    <td><div='global' id='tres'>Consumo mensual(m3): ".$DatosLectura[consumo]."</div></td>					
                    <td><div='global' id='tres'>Fecha de lectura: ".fecha_guion($DatosLectura[fecha_lectura])."</div></td>			
                    </tr>
                    
                    <tr>
                    ";
		echo" 
                    <td><div='global' id='tres'>001</div></td>								
                    <td><div='global' id='tres'>Servicio de Agua</div></td>
                    <td></td>
                    <td><div='global' id='tres'>".$DatosCliente[monto]."</div></td>								
                    <td><div='global' id='tres'>001</div></td>								
                    <td><div='global' id='tres'>Servicio de Agua </div></td>	
                    <td></td>
                    <td><div='global' id='tres'>".$DatosCliente[monto]."</div></td>								
                    </tr>
                    
                    <tr>
                    ";
		
                    $saldo=0.00;
                    //$consultarmora = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND pagado='NO' AND mes!='$mes' ");
                    $consultarmora = "SELECT * FROM recibos where num_cuenta='$Datos[num_cuenta]' AND pagado='NO' AND mes!='$mes'";
                    $result_consultarmora= $db->query($consultarmora);
                
                    while($DatosMora = mysqli_fetch_array($result_consultarmora))
                        {
                        $saldo= $saldo + $DatosMora["monto"] + $DatosMora["recargo"];
                        }			
                echo" 
                    <td><div='global' id='tres'>002</div></td>		
                    <td><div='global' id='tres'>Saldo Pendiente</div></td>
                    <td></td>
                    <td><div='global' id='tres'>".$saldo."</div></td >
                    <td><div='global' id='tres'>002</div></td>		
                    <td><div='global' id='tres'>Saldo Pendiente</div></td>
                    <td></td>
                    <td><div='global' id='tres'>".$saldo."</div></td>
                    </tr>
                    
                    <tr>";
                echo"  
                    
                    ";
                    //$consultarrecargo = mysqli_query($server, "SELECT * FROM recargo");
                    $consultarrecargo = "SELECT * FROM recargo";
                    $result_consultarrecargo= $db->query($consultarrecargo);
                
                    $DatosRecargo = mysqli_fetch_array($result_consultarrecargo);
                    $recargo = $DatosRecargo["monto"] + $DatosCliente["monto"];
                    $total = $DatosCliente["monto"] + $saldo;
		echo"
                    <td></td>		
                    <td><div='global' id='dos'>Total</div></td>
                    <td></td>
                    <td><div='global' id='tres'>".$total."</div></td>
                    <td></td>		
                    <td><div='global' id='dos'>Total</div></td>
                    <td></td>
                    <td><div='global' id='tres'>".$total."</div></td>
                    </tr>
                    
                    <tr>
                    ";
		echo"  
                    <td colspan=3> <div class='formato'>Ultima fecha de pago: </td>
                    
                    								
                    <td><div='global' id='tres'>".fecha_guion($DatosCliente[fecha_pago])."</td>								
                    <td colspan=3> <div class='formato'>Ultima fecha de pago: </td>					
                    <td><div='global' id='tres'>".fecha_guion($DatosCliente[fecha_pago])."</td>								
                    </tr>
                   </table>
                    <input type='hidden' name='num_cuenta$n' value='$Datos[num_cuenta]'>
                    <input type='hidden' name='cod_lectura$n' value='$DatosConsumo[cod_lectura]'>
                    <input type='hidden' name='tarifa$n' value='$tarifa_ok[precio]'>
                    <input type='hidden' name='n' value='$n'>
		
                    ";
		echo"  				
                    
                    ";
                    $num_fila++; 
                    if($n==1){
                    echo" 
                    <H1 class=SaltoDePagina> </H1>
                    ";
                    $n=0;
                    }
	}
    }
?>
						
<?php mysqli_close(); ?>
    

 </page> 

<?php
 $content = ob_get_clean();
 
 require_once('html2pdf/html2pdf.class.php');
 try {
 $pdf = new HTML2PDF('P','A4','es','UTF-8');//L y P*/
 $pdf->pdf->SetDisplayMode('fullpage');
 $pdf -> writeHTML($content);
 $pdf -> pdf ->IncludeJS('print(TRUE)');
 $pdf -> output('listado_rec_imp.pdf');
 }
  catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>



 
 
 
 

 
