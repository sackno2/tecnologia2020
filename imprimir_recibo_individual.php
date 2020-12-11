<?php
include('../conexion/conexion.php'); //incluye datos de la conexion a la base de datos
include('../conexion/sesion.php');	// incluye datos de la sesion
include('../includes/fechas.php');	//
include('../includes/mes_letras.php');	//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-419" xml:lang="es-419">
<head>
	<link rel="shortcut icon" href="images/favicon.ico"><!--incluye favicon (icono pequeño de la pestaña del navegador)-->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<head><title>ACASAPUE - Imprimir Recibo</title>

</style>
   
			<!--estilo de la seleccion de los iconos (div)-->
						
			<style type="text/css" media="print">
			Div.PrintArea{page-break-after:always;writing-mode:lr-tb;}
			#sidebar,#header,#nav,#footer,#masthead, #navbar,{color:#FFFFFF;display:none;}
			.NomPrint{display:none !important;}
			</style>
   
			<!--Redondear bordes de tablas agregar con class="tabla_bordes"-->
				<style type="text/css">
				h1{
				page-break-before: always;
				}
				</style>
			<style>
				.formato{
					color: blue;
					text-align: center;
					font-size: 10pt;
					font-face: sans-serif;
					
					}
			</style>					
			<style>
				.formato1{
					color: blue;
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
			   color: blue;
			text-align: right;
			font-size: 10pt;
			font-face: sans-serif;
			}
			#dos{
			   margin-left:15px;
			   float:left;
			   width:100px;
			   color: blue;
			text-align: center;
			font-size: 10pt;
			}
			#tres{
			   margin-left:15px;
			   float:left;
			   width:100px;
			   color: blue;
			text-align: left;
			font-size: 10pt;
			}				
			#cuatro{
			   margin-left:15px;
			   color: blue;
			   float:left;
			   width:100px;
			  
			text-align: right;
			font-size: 10pt;
			}		
			</STYLE>			

</head>
<body onload="window.print()">
<font face="arial" size="1">
<?php

$num_recibo_post = $_GET['recibo'];

//$num_cuenta = $_GET['num_cuenta'];
//$num_recibo_post = 111925;
//$num_cuenta_post = 1001001025;


								// EXTRAE DATOS DE TABLA RECIBO
								$datos_recibo = mysqli_query($server, "SELECT * FROM recibos WHERE num_recibo='$num_recibo_post'");
                                                                $result_datos_recibo = $db->query($datos_recibo); 
                                                                
								if($recibo_ok = mysqli_fetch_array($result_datos_recibo))						
								$cod_recibo =$recibo_ok["cod_recibo"];
								$num_recibo	=$recibo_ok["num_recibo"];
								$num_cuenta	=$recibo_ok["num_cuenta"];
								$fecha_cobro =$recibo_ok["fecha_cobro"];	
								$fecha_pago	=$recibo_ok["fecha_pago"];
								$fecha_pagado =$recibo_ok["fecha_pagado"];	
								$mes =$recibo_ok["mes"];	
								$anio =$recibo_ok["anio"];	
								$cod_lectura =$recibo_ok["cod_lectura"];	
								$monto =$recibo_ok["monto"];	
								$recargo =$recibo_ok["recargo"];
								$monto_recargo = $monto+$recargo;	
								$pagado =$recibo_ok["pagado"];	
								$estado =$recibo_ok["estado"];	
								$anulado =$recibo_ok["anulado"];	
								
								
								
								
								//EXTRAER DATOS DE TABLA CUENTA						
								$cta = "SELECT * FROM inv_cliente WHERE num_cuenta='$num_cuenta'";	
                                                                $result_cta = $db->query($cta); 
								if($cta_ok = mysqli_fetch_array($cta))
								$num_cuenta = $cta_ok["num_cuenta"];
								$cod_cliente = $cta_ok["cod_cliente"];
								$cod_medidor = $cta_ok["cod_medidor"];
								
								

								
								//obtener datos del cliente
								$cliente = "SELECT * FROM cliente WHERE cod_cliente='$cod_cliente'";	
                                                                $result_cliente = $db->query($cliente); 
								if($cliente_ok = mysqli_fetch_array($result_cliente))
								$nombre = $cliente_ok["nombre"];
								$apellido = $cliente_ok["apellido"];
								
								//CONSUMO								
								//obtener datos de la lectura del mes a facturar
								$lectura_query = "SELECT * FROM lecturas WHERE num_cuenta='$num_cuenta' AND mes='$mes' AND anio='$anio'";			
								$result_lectura_query = $db->query($lectura_query); 
                                                                
                                                                if($lectura_ok = mysqli_fetch_array($lectura_query))
								$mes = $lectura_ok["mes"];
								$anio = $lectura_ok["anio"];
								$cod_lectura = $lectura_ok["cod_lectura"];
								$lectura_anterior = $lectura_ok["lectura_anterior"];
								$lectura_actual = $lectura_ok["lectura_actual"];
								$consumo = $lectura_ok["consumo"];
								
								//CONSUMO HISTORIAL
								//para el historial de los ultimos tres meses
								$mes_desc1=$mes-03;//descuenta 3 meses
								$historial1 = "SELECT * FROM lectura WHERE num_cuenta='$num_cuenta' AND mes='$mes_desc1' AND anio='$anio' ORDER BY num_cuenta DESC LIMIT 0,4";			
                                                                $result_historial1 = $db->query($historial1); 
                                                                
								if($historial_ok1 = mysqli_fetch_array($result_historial1))
								$mes1 = $historial_ok1["mes"];
								$consumo1=$historial_ok1["consumo"];
								
								$mes_desc2=$mes-02;//descuenta 2 meses
								$historial2 = "SELECT * FROM lectura WHERE num_cuenta='$num_cuenta' AND mes='$mes_desc2' AND anio='$anio' ORDER BY num_cuenta";			
                                                                $result_historial2 = $db->query($historial2); 
                                                                
								if($historial_ok2 = mysqli_fetch_array($result_historial2))
								$mes2 = $historial_ok2["mes"];
								$consumo2=$historial_ok2["consumo"];
								
								$mes_desc3=$mes-01;//descuenta 1 mes
								$historial3 = "SELECT * FROM lectura WHERE num_cuenta='$num_cuenta' AND mes='$mes_desc3' AND anio='$anio' ORDER BY num_cuenta";			
								$result_historial3 = $db->query($historial3); 
                                                                
                                                                if($historial_ok3 = mysqli_fetch_array($result_historial3))
								$mes3 = $historial_ok3["mes"];
								$consumo3=$historial_ok3["consumo"];
								
								//TARIFAS PARA HISTORIAS
								//obtener datos del valor por consumo (segun rango y tarifa)
								$tarifa1 = "SELECT * FROM tarifa ORDER BY cod_tarifa LIMIT 0,3";	
                                                                $result_tarifa1 = $db->query($tarifa1); 
                                                                
								if($tarifa_ok1 = mysqli_fetch_array($result_tarifa1))
								$cod_tarifa1 = $tarifa_ok1["cod_tarifa"];
								$rango_inicio1 = $tarifa_ok1["inicio"];
								$rango_final1 = $tarifa_ok1["final"];
								$precio_tarifa1 = $tarifa_ok1["precio"];
								
								//obtener datos del valor por consumo (segun rango y tarifa)
								$tarifa2 = "SELECT * FROM tarifa ORDER BY cod_tarifa LIMIT 1,3";			
								$result_tarifa2 = $db->query($tarifa2); 
                                                                
                                                                if($tarifa_ok2 = mysqli_fetch_array($result_tarifa2))
								$cod_tarifa2 = $tarifa_ok2["cod_tarifa"];
								$rango_inicio2 = $tarifa_ok2["inicio"];
								$rango_final2 = $tarifa_ok2["final"];
								$precio_tarifa2 = $tarifa_ok2["precio"];
								
								//obtener datos del valor por consumo (segun rango y tarifa)
								$tarifa3 = "SELECT * FROM tarifa ORDER BY cod_tarifa LIMIT 2,3";	
                                                                $result_tarifa3 = $db->query($tarifa3); 
                                                                
								if($tarifa_ok3 = mysqli_fetch_array($result_tarifa3))
								$cod_tarifa3 = $tarifa_ok3["cod_tarifa"];
								$rango_inicio3 = $tarifa_ok3["inicio"];
								$rango_final3 = $tarifa_ok3["final"];
								$precio_tarifa3 = $tarifa_ok3["precio"];
								
																
								//VALOR CONSUMO HISTORIAL
								///determinar valor consumo 1
								if ($consumo1 >=$rango_inicio1 AND $consumo1 <= $rango_final1 )
								{$valor_consumo1 = $precio_tarifa1; }
								
								if ($consumo1 >=$rango_inicio2 AND $consumo1 <= $rango_final2 )
								{$valor_consumo1 = $precio_tarifa2; }
								
								if ($consumo1 >=$rango_inicio3 AND $consumo1 <= $rango_final3 )
								{$valor_consumo1 = $precio_tarifa3; }
								
								///determinar valor consumo 2
								if ($consumo2 >=$rango_inicio1 AND $consumo2 <= $rango_final1 )
								{$valor_consumo2 = $precio_tarifa1; }
								
								if ($consumo2 >=$rango_inicio2 AND $consumo2 <= $rango_final2 )
								{$valor_consumo2 = $precio_tarifa2; }
								
								if ($consumo2 >=$rango_inicio3 AND $consumo2 <= $rango_final3 )
								{$valor_consumo2 = $precio_tarifa3; }
								
								///determinar valor consumo 3
								if ($consumo3 >=$rango_inicio1 AND $consumo3 <= $rango_final1 )
								{$valor_consumo3 = $precio_tarifa1; }
								
								if ($consumo3 >=$rango_inicio2 AND $consumo3 <= $rango_final2 )
								{$valor_consumo3 = $precio_tarifa2; }
								
								if ($consumo3 >=$rango_inicio3 AND $consumo3 <= $rango_final3 )
								{$valor_consumo3 = $precio_tarifa3; }
								
								
								
?>
<table border="0" width="100%" height=""  align="right" cellspacing="0" cellpadding="1" style="font_family:arial;font-size:9">
	<tr>
		<td width="50%" align="center">
			
			
			<!--encabezado--><!---->
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9">
				<tr>
					<td colspan="4" style="line-height:50px;" align="center">&nbsp;</td>
				</tr>
				
				
				<tr>
					<td colspan=3 style="line-height:10px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($nombre.' '.$apellido);?></td>
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $nombre_zona;?> </td>
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $nombre_sector;?> </td>
					<td style="line-height:10px;">&nbsp;<?php echo $num_recibo;?>  </td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_bloque;?></td> 
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;</td> 
					<td style="line-height:10px;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;</td> 
					<td style="line-height:10px;">&nbsp;<?php echo $num_cuenta;?> </td>
				</tr>
				
				<tr>
				
					<td> <br><br>  </td>
				</tr>
				
				<tr>
					<td width="25%" style="line-height:10px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lectura_actual;?></td>
					<td width="25%" style="line-height:10px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lectura_anterior;?> </td>
					<td width="25%" style="line-height:10px;" align="left"><?php echo $consumo;?></td>
					<td width="25%" style="line-height:10px;" align="left"><?php echo fecha_guion($fecha_cobro);?></td>
				</tr>
				
			</table>	
			
			<!--DIV MOSTRARA LA LINEA DEL SERVICIO-->
			<div style="width: 100%; height: 110px; text-align: left;border: 0px solid silver;">	
				<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
					<tr>
				
						<td> <br><br>  </td>
					</tr>
					<?php //EXTRAER DATOS DE TABLA RECIBO LINEA
								//extraer el servicio
								/*$recibo_linea = mysqli_query($server, "SELECT * FROM recibo_linea WHERE cod_recibo='$cod_recibo'");			
								if($recibo_linea_ok = mysqli_fetch_array($recibo_linea))
								$cod_servicio =$recibo_linea_ok["cod_servicio"];	
								$costo =$recibo_linea_ok["costo"];
								
								//EXTRAER DATOS DE TABLA SERVICIO
								//extraer el servicio
								$servi = mysqli_query($server, "SELECT * FROM servicio WHERE cod_servicio='$cod_servicio'");			
								if($servi_ok = mysqli_fetch_array($servi))
								$nombre_servicio =$servi_ok["nombre"];*/
								///////////////////////////////////////////////////////////////
								$recibo_linea = "SELECT * FROM recibo_linea WHERE cod_recibo='$cod_recibo'";
								$result_recibo_linea = $db->query($recibo_linea);
								//$recibo_linea = mysqli_query($server, "SELECT servicio.cod_servicio,servicio.nombre, recibo_linea.cod_recibo,recibo_linea.cod_servicio, recibo_linea.costo FROM servicio,recibo_linea WHERE (servicio.cod_servicio=recibo_linea.cod_servicio) AND recibo_linea.cod_recibo='$cod_recibo' ORDER recibo_linea.cod_servicio ASC");
									
								While($recibo_linea_ok = mysqli_fetch_array($result_recibo_linea))
								{
									//$cod_servicio =$recibo_linea_ok["cod_servicio"];	
									//$costo =$recibo_linea_ok["costo"];
									
									$consultar_servi = "SELECT * FROM servicio WHERE cod_servicio='$recibo_linea_ok[cod_servicio]'";
									$result_recibo_linea = $db->query($consultar_servi);
                                                                        $Datos_servi = mysqli_fetch_array($result_recibo_linea);
									
									echo"
									<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$recibo_linea_ok[cod_servicio]</td>
									<td >$Datos_servi[nombre]</td>
									
									<td>$&nbsp;$recibo_linea_ok[costo]</td>
									</tr>";
									
								}
								//EXTRAER DATOS DE TABLA SERVICIO
								/*extraer el servicio
								$servi = mysqli_query($server, "SELECT * FROM servicio WHERE cod_servicio='$cod_servicio'");			
								if($servi_ok = mysqli_fetch_array($servi))
								$nombre_servicio =$servi_ok["nombre"];*/
					?>
					
				</table>
			</div>	
			
			<!--mora-->	
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
				
				<tr>
					<td style="line-height:20px;" width="50%" align="right">$&nbsp;<?php echo $monto_recargo;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="line-height:20px;" width="50%" align="right">$&nbsp;<?php echo $monto;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				
				</tr>	
					<td style="line-height:25px;" width="50%" align="right"> </td>   
					<td style="line-height:25px;" width="50%" align="right"><?php echo fecha_guion($fecha_pago);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>
			
			<!--consumo-->	
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
				<tr>
					<td style="line-height:20px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes1);?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes2);?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes3);?></td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo1;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo2;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo3;?></td>
				</tr>
				<tr>
					<td style="line-height:15px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo1;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo2;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo3;?></td>
				</tr>
				<tr>
					<td style="line-height:5px;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" style="line-height:35px;">&nbsp;</td>
				</tr>
			</table>
		
		
		
		
		
		
		
		
		
		</td>
		<td width="50%" align="center">
			
		
		
		
		
		
		
		
		
		
			<!--encabezado--><!---->
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9">
				<tr>
					<td colspan="4" style="line-height:50px;" align="center">&nbsp;</td>
				</tr>
				
				
				<tr>
					<td colspan=3 style="line-height:10px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper($nombre.' '.$apellido);?></td>
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $nombre_zona;?> </td>
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $nombre_sector;?> </td>
					<td style="line-height:10px;">&nbsp;<?php echo $num_recibo;?>  </td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_bloque;?></td> 
					<td style="line-height:10px;">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;</td> 
					<td style="line-height:10px;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan=3 style="line-height:10px;">&nbsp;</td> 
					<td style="line-height:10px;">&nbsp;<?php echo $num_cuenta;?> </td>
				</tr>
				
				<tr>
				
					<td> <br><br>  </td>
				</tr>
				
				<tr>
					<td width="25%" style="line-height:10px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lectura_actual;?></td>
					<td width="25%" style="line-height:10px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lectura_anterior;?> </td>
					<td width="25%" style="line-height:10px;" align="left"><?php echo $consumo;?></td>
					<td width="25%" style="line-height:10px;" align="left"><?php echo fecha_guion($fecha_cobro);?></td>
				</tr>
				
			</table>	
			
			<!--DIV MOSTRARA LA LINEA DEL SERVICIO-->
			<div style="width: 100%; height: 110px; text-align: left;border: 0px solid silver;">	
				<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
					<tr>
				
						<td> <br><br>  </td>
					</tr>
					<?php //EXTRAER DATOS DE TABLA RECIBO LINEA
								//extraer el servicio
								/*$recibo_linea = mysqli_query($server, "SELECT * FROM recibo_linea WHERE cod_recibo='$cod_recibo'");			
								if($recibo_linea_ok = mysqli_fetch_array($recibo_linea))
								$cod_servicio =$recibo_linea_ok["cod_servicio"];	
								$costo =$recibo_linea_ok["costo"];
								
								//EXTRAER DATOS DE TABLA SERVICIO
								//extraer el servicio
								$servi = mysqli_query($server, "SELECT * FROM servicio WHERE cod_servicio='$cod_servicio'");			
								if($servi_ok = mysqli_fetch_array($servi))
								$nombre_servicio =$servi_ok["nombre"];*/
								///////////////////////////////////////////////////////////////
								$recibo_linea = "SELECT * FROM recibo_linea WHERE cod_recibo='$cod_recibo'";
								$result_recibo_linea = $db->query($recibo_linea);
								//$recibo_linea = mysqli_query($server, "SELECT servicio.cod_servicio,servicio.nombre, recibo_linea.cod_recibo,recibo_linea.cod_servicio, recibo_linea.costo FROM servicio,recibo_linea WHERE (servicio.cod_servicio=recibo_linea.cod_servicio) AND recibo_linea.cod_recibo='$cod_recibo' ORDER recibo_linea.cod_servicio ASC");
									
								While($recibo_linea_ok = mysqli_fetch_array($result_recibo_linea))
								{
									//$cod_servicio =$recibo_linea_ok["cod_servicio"];	
									//$costo =$recibo_linea_ok["costo"];
									
									$consultar_servi = mysqli_query($server, "SELECT * FROM servicio WHERE cod_servicio='$recibo_linea_ok[cod_servicio]'");
									$result_consultar_servi= $db->query($consultar_servi);
                                                                        
                                                                        $Datos_servi = mysqli_fetch_array($result_consultar_servi);
									
									echo"
									<tr>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$recibo_linea_ok[cod_servicio]</td>
									<td >$Datos_servi[nombre]</td>
									
									<td>$&nbsp;$recibo_linea_ok[costo]</td>
									</tr>";
									
								}
								//EXTRAER DATOS DE TABLA SERVICIO
								/*extraer el servicio
								$servi = mysqli_query($server, "SELECT * FROM servicio WHERE cod_servicio='$cod_servicio'");			
								if($servi_ok = mysqli_fetch_array($servi))
								$nombre_servicio =$servi_ok["nombre"];*/
					?>
					
				</table>
			</div>	
			
			<!--mora-->	
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
				
				<tr>
					<td style="line-height:20px;" width="50%" align="right">$&nbsp;<?php echo $monto_recargo;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="line-height:20px;" width="50%" align="right">$&nbsp;<?php echo $monto;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				
				</tr>	
					<td style="line-height:25px;" width="50%" align="right"> </td>   
					<td style="line-height:25px;" width="50%" align="right"><?php echo fecha_guion($fecha_pago);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>
			
			<!--consumo-->	
			<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font_family:arial;font-size:9;border: 0px solid silver;">
				<tr>
					<td style="line-height:20px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes1);?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes2);?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mes_letras($mes3);?></td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo1;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo2;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consumo3;?></td>
				</tr>
				<tr>
					<td style="line-height:15px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="line-height:10px;">&nbsp;</td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo1;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo2;?></td><td style="line-height:10px;" width="25%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;<?php echo $valor_consumo3;?></td>
				</tr>
				<tr>
					<td style="line-height:5px;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" style="line-height:35px;">&nbsp;</td>
				</tr>
			</table>
		
		
		
			
		</td>
	</tr>
</table>
</font>
</body>
		