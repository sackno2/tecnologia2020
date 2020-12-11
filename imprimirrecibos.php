<?php
include('../conexion/conexion.php'); //incluye datos de la conexion a la base de datos
include('../conexion/sesion.php');
include('../includes/mes_letras.php');	//
include('../includes/fechas.php');	//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-419" xml:lang="es-419">
<head>
	

    
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
<body>
			<?php		
					$filtro=$_GET['cod_bloque'];
					$mes=$_GET['mes'];//agregado
					$anio=$_GET['anio'];//agregado
					
					$nfilas=0;

					$consultar = mysqli_query($server, "SELECT * FROM cuenta WHERE cod_bloque='$filtro' ORDER BY cod_cliente ASC");
					$nfilas = mysqli_num_rows($consultar);	
						echo'<body onload=window.print(); window.close();>';
					
					if($nfilas!=0)
					{
						$num_fila = 0;
						$n=0;
						while($Datos = mysqli_fetch_array($consultar))
						{
						echo'<table id="datos"  align="center" width="95%" cellspacing="0" cellpadding="0" style="border: solid 1px #FFFFFF;" >';
							$n=$n+1;
							$consultarcliente = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND mes='$mes' AND anio='$anio' AND anulado='NO' AND estado='Activo'");
							$DatosCliente = mysqli_fetch_array($consultarcliente);

					
							$bgcolor1 = " '#CED8F6' "; // color sobre seleccion 
							$bgcolor2 = " '#ffffff' ";// color original blanco 
							$bgcolor3 = " '#EEE9FD' ";// color original 2
							echo  '<tr '; 
							if ($num_fila%2==0) 
							 echo 'bgcolor=#ffffff onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor2.';"' ; //si el resto de la división es 0 pongo un color 
							else 
							 echo 'bgcolor=#EEE9FD onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor3.';"'; //si el resto de la división NO es 0 pongo otro color 
														 
								echo '> '; 
										
									echo" </tr> 
									<td><br><br><br><br><br></td >
									<tr>
									";

								
								
							$ConsultarNombreCliente = mysqli_query($server, "SELECT * FROM cuenta where cod_cuenta='$DatosCliente[cod_cuenta]'");
							$DatosNombreCliente = mysqli_fetch_array($ConsultarNombreCliente);
							$ConsultarMostrarNombreCliente = mysqli_query($server, "SELECT * FROM cliente where cod_cliente='$DatosNombreCliente[cod_cliente]'");
							$DatosMostrarNombreCliente = mysqli_fetch_array($ConsultarMostrarNombreCliente);
									echo"
									<td colspan=3 div class='formato'>".$DatosMostrarNombreCliente[nombre]." ".$DatosMostrarNombreCliente[apellido]."</div></td>								
									<td ></td>
									<td colspan=3 div class='formato'>".$DatosMostrarNombreCliente[nombre]." ".$DatosMostrarNombreCliente[apellido]."</div></td>								
									<td ></td>
									</tr><tr>
									";
							$ConsultarZona = mysqli_query($server, "SELECT * FROM zona where cod_zona='$DatosNombreCliente[cod_zona]'");
							$DatosZona = mysqli_fetch_array($ConsultarZona);
									echo"
									<td colspan=3 div class='formato'>".$DatosZona[nombre]."</div> </td>								
									<td ></td>							
									<td colspan=3 div class='formato'>".$DatosZona[nombre]."</div> </td>								
									<td ></td>						
									</tr><tr>
									";
									
							$ConsultarSector = mysqli_query($server, "SELECT * FROM sector where cod_sector='$DatosNombreCliente[cod_sector]'");
							$DatosSector = mysqli_fetch_array($ConsultarSector);
									echo"
									<td colspan=3 div class='formato'>".$DatosSector[nombre]."</div> </td>								
									<td><div='global' id='tres'>".$DatosCliente[num_recibo]."</div></td>
									<td colspan=3 div class='formato'>".$DatosSector[nombre]."</div> </td>								
									<td><div='global' id='tres'>".$DatosCliente[num_recibo]."</div></td>
									</tr><tr>
									";
								
							$ConsultarBloque = mysqli_query($server, "SELECT * FROM bloque where cod_bloque='$DatosNombreCliente[cod_bloque]'");
							$DatosBloque = mysqli_fetch_array($ConsultarBloque);
									echo"
									<td colspan=3 div class='formato'>".$DatosBloque[nombre] ."</div></td>								
									<td ></td>					
									<td colspan=3 div class='formato'>".$DatosBloque[nombre] ."</div></td>								
									<td ></td>									
									</tr><tr>
									";
									
							$ConsultarCasa = mysqli_query($server, "SELECT * FROM cuenta where num_casa='$DatosNombreCliente[num_casa]'");
							$DatosCasa = mysqli_fetch_array($ConsultarCasa);
									echo"
									<td colspan=3 div class='formato'>".$DatosCasa[num_casa] ."</div></td>								
									<td><div='global' id='tres'>".$DatosCliente[cod_cuenta]."</div></td>							
									<td colspan=3 div class='formato'>".$DatosCasa[num_casa] ."</div></td>								
									<td><div='global' id='tres'>".$DatosCliente[cod_cuenta]."</div></td>
									<td ></td><td ></td>									
									</tr><tr>
									";
									
								
							$consultarlectura = mysqli_query($server, "SELECT * FROM lectura where cod_cuenta='$DatosCliente[cod_cuenta]' AND mes='$mes' AND anio='$anio' AND cobro!='OS'");
							$DatosLectura = mysqli_fetch_array($consultarlectura);
									echo" </tr> 
									<td><br><br></td >
									<tr>
									<td><div='global' id='uno'>".$DatosLectura[lectura_actual]."</div> </td>					
									<td><div='global' id='dos'>".$DatosLectura[lectura_anterior]."</div> </td>								
									<td><div='global' id='tres'>".$DatosLectura[consumo]."</div></td>								
									<td><div='global' id='tres'>".fecha_guion($DatosLectura[fecha_lectura])."</div> </td>							
									<td><div='global' id='uno'>".$DatosLectura[lectura_actual]."</div> </td>			
									<td><div='global' id='dos'>".$DatosLectura[lectura_anterior]."</div> </td>							
									<td><div='global' id='tres'>".$DatosLectura[consumo]."</div>		</td>					
									<td><div='global' id='tres'>".fecha_guion($DatosLectura[fecha_lectura])."</div>	</td>			
									
									</tr><tr>
									";
									echo" </tr> 
									<td><br><br></td >
									<tr>
									
									
									<td><div='global' id='dos'>001</div></td>								
									<td><div='global' id='dos'>Servicio de Agua </div></td>
									<td></td >
									<td><div='global' id='tres'>".$DatosCliente[monto]."</div>	</td>								
									<td><div='global' id='dos'>001</div></td>								
									<td><div='global' id='dos'>Servicio de Agua </div></td>	
									<td></td >
									<td><div='global' id='tres'>".$DatosCliente[monto]."</div></td>								
											
									</tr><tr>
												
									";
									
									$saldo=0.00;
									
									$consultarmora = mysqli_query($server, "SELECT * FROM recibo where cod_cuenta='$Datos[cod_cuenta]' AND pagado='NO' AND mes!='$mes' ");
									while($DatosMora = mysqli_fetch_array($consultarmora))
							{
									$saldo= $saldo + $DatosMora["monto"] + $DatosMora["recargo"];
										
							}			
									echo" </tr> 
									<td><div='global' id='dos'>002</div></td>		
									<td><div='global' id='dos'>Saldo Pendiente</div></td >
									<td></td >
									<td><div='global' id='tres'>".$saldo."</div></td >
									<td> <div='global' id='dos'>002</div></td>		
									<td><div='global' id='dos'>Saldo Pendiente</div></td >
									<td></td >
									<td><div='global' id='tres'>".$saldo."</div></td >
									<tr>";
									
								echo" </tr> 
									<td><br><br><br><br><br></td >
									<tr>";
								
									
							$consultarrecargo = mysqli_query($server, "SELECT * FROM recargo");
							$DatosRecargo = mysqli_fetch_array($consultarrecargo);
							$recargo = $DatosRecargo["monto"] + $DatosCliente["monto"];
							$total = $DatosCliente["monto"] + $saldo;
									echo"
									<td width='15%'</td>								
									<td div='global' id='uno'>".$recargo."</td></td>							
									<td width='15%'></td>								
									<td><div='global' id='tres'>".$total."</td></td>								
									<td width='15%'</td>								
									<td div='global' id='uno'>".$recargo."</td></td>								
									<td width='15%'></td>								
									<td><div='global' id='tres'>".$total."</td></td>								
									</tr><tr>
									";
									
									echo" </tr> 
									<td><br></td >
									<tr>
									
									
									<td width='15%'></td>								
									<td width='15%'></td>								
									<td width='15%'></td>								
									<td><div='global' id='tres'>".fecha_guion($DatosCliente[fecha_pago])."</td></td>								
									<td width='15%'></td>								
									<td width='15%'></td>								
									<td width='15%'></td>								
									<td><div='global' id='tres'>".fecha_guion($DatosCliente[fecha_pago])."</td></td>								
								</tr>
							<input type='hidden' name='cod_cuenta$n' value='$Datos[cod_cuenta]'>
							<input type='hidden' name='cod_lectura$n' value='$DatosConsumo[cod_lectura]'>
							<input type='hidden' name='tarifa$n' value='$tarifa_ok[precio]'>
							<input type='hidden' name='n' value='$n'>
							<input type='hidden' name='n' value='$n'>
								";
									echo" </tr> 
									<td><br><br><br><br><br><br><br><br><br><br><br><br><br>
									</td >
									
								
									<tr>				
								
								
								</table>
								";
								$num_fila++; 
								if($n==1){
								echo"</tr> 
									<H1 class=SaltoDePagina> </H1>
										
									";
									$n=0;
								}
						}
					}
							
						?>
						

<?php mysqli_close(); ?>
</body>