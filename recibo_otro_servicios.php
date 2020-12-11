<?php
  $page_title = 'Emision de recibos colectivos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  error_reporting(0);
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

    

    <!--<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="../jquery1.js"></script>
    <script type="text/javascript" src="../script1.js"></script>
   <style type="text/css">
.art-post .layout-item-0 { padding-right: 10px;padding-left: 10px; }
   .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
   </style>
   
			
			
			
			
	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript">
	
	/************************************************************************************************************
	Ajax client lookup
		
	************************************************************************************************************/	
var ajax = new sack();
	var currentClientID=false;
	function getClientData()
	{
		var clientId = document.getElementById('clientID').value.replace(/[^0-9]/g,'');
		if(clientId.length!=0 && clientId!=currentClientID){
			currentClientID = clientId
			ajax.requestFile = 'getClient.php?getClientId='+clientId;	// Specifying which file to get
			ajax.onCompletion = showClientData;	// Specify function that will be executed after file has been found
			ajax.runAJAX();		// Execute AJAX function			
		}
		
	}
	
	function showClientData()
	{
		var formObj = document.forms['clientForm'];	
		eval(ajax.response);
	}
	
	
	function initFormEvents()
	{
		document.getElementById('clientID').onblur = getClientData;
		document.getElementById('clientID').focus();
	}
	window.onload = initFormEvents;
	</script>
	
	
	

		<!--Imprimir el recibo dentro del frame - formato html-->
		<script> 
      	 function printFrame(iframeT){ 

         	 try{ 
            	 iframeT.focus(); 
             iframeT.print(); 
          } 
         	 catch(e){ 
            	 alert(e.message); 
         	 } 
       	 }	
     	 </script> 
		 
		 <!--llenar el campo costo de servicio desde el select de servicio-->
		 <script language="javascript">
		function cargaPrecio(IdSelect){
			document.form2.costo.value = IdSelect.substring(5,10);
			document.form2.cod_servicio.value = parseFloat(IdSelect.substring(1,5));
			return;
		}
		</script>

		 <!--Llama al script ajax para la captura de las linea de los servicios-->
		 <script language="JavaScript" type="text/javascript" src="ajax_servicios.js"></script>
		 
		 <!-- estilo para el div de los servicios-->
		 <style type="text/css"> 
		 .posicion{
			position:absolute;
			margin-left:1px;
			margin-top:-235px;
			left:25;
			width:760px;
			height:100%;}
		 </style> 
		
		<!--bloquear boton derecho de mouse-->
		 <script language="javascript">
			document.oncontextmenu = function () {return false;}
		</script>

		<script language="JavaScript" type="text/javascript" src="ajax_eliminar.js"></script> 
</head>
<body>

<table align="center" width="800" bgcolor="white" height="530" cellspacing="1" cellpadding="0" style="border: solid 1px grey;" class="tabla_bordes"><!--tabla margen del tama�o del formulario-->
	<tr>
		<td>
	
<!--===================================================================================================================================================-->  							
<!--======================================================INICIO BLOQUE DEL AREA DE TRABAJO============================================================-->

<table align="center" width="99%" bgcolor="" height="350" cellspacing="0" cellpadding="0" style="border: solid 0px silver;" ><!--tabla margen del tama�o del formulario-->
	<tr>
		<td width="50%">
			<!-- Titulo del modulo o formulario--> 
			<BR>
		
		
					<?php /*
						if(isset($_GET['cod_cliente']))
						{
							$get_cliente = $_GET['cod_cliente'];
							
						} 
						 else
						{
							$get_cliente = '';  
						}
					*/
					?>
					<fieldset class="tabla_bordes" style="border: solid 1px silver;">
					<legend align="left">EMISION DE RECIBO DE OTROS SERVICIOS</legend>
								
								
							
					
					
					<!--Tabla Formulario-->
					<form name="clientForm" action="" method="POST" autocomplete="off">
					<table align="center" width="99%" height="350" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
						
						<tr>
							<td align="right">
								N&uacute;mero Cuenta:
							</td>
							<td>
								<input type="text" pattern="[0-9]{1,10}" maxlength="10" name="clientID" id="clientID" class="textbox" title="Valor numerico" style="width:100px;" autofocus required />
							</td>
							<td align="right">
								Vence:
							</td>
							<td>
								<input type='date' min="<?php echo date('Y-m-d')?>" name='vence' class="textbox" style="width:175px;" required />
								
							</td>
						</tr>	
						<tr>
							<td align="right">
								Nombre :
							</td>
							<td>
								<input type="hidden" name="nombre" id="nombre" class="textbox" style="width:90%;" required />
								<input type="text" name="nombre2" id="nombre2" class="textbox" style="width:90%;" disabled />
							</td>
							<td align="right">
								Apellido:
							</td>
							<td>
								<input type="hidden" name="apellido" id="apellido" class="textbox" style="width:90%;" required />
								<input type="text" name="apellido2" id="apellido2" class="textbox" style="width:90%;" disabled />
							</td>
						</tr>
						 <tr>
							<td align="right">
								<b>Ingrese N&uacute;mero de Recibo:</b>
							</td>
							<td colspan="3">
								<input type="text" pattern="[0-9]{0,10}" name="num_recibo" maxlength="10" class="textbox" style="width:100px;" required />
							</td>
						</tr>
						<tr height="205">	
							<td align="right" colspan="4">
								<!-- espacio donde se superpondra el div de servicios-->
								
							</td>
						</tr>
						<tr>
							<td align="left" colspan="2">
								&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="recibos.php" class="art-button" title="Regresar"/>Regresar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="script_nuevo_recibo.php" class="btn btn-primary" title="Emitir un Nuevo Recibo"/>Nuevo Recibo</a>&nbsp;&nbsp;&nbsp;&nbsp;	
							</td>
							<td align="right" colspan="2">
														
								<input type="submit" name="aplicar" value="Aplicar" class="btn btn-primary"/>&nbsp;&nbsp;&nbsp;&nbsp;
								
							</td>
						</tr>
					</table>					
					</form>
					
					<div class="posicion" align="center" style="height: 180px; overflow-x:no; overflow-y:no; border: 0px solid #CED8F6;">
					<!--Formulario seleccion de servicio-->
					<form name="form2" action="" method="POST" onsubmit="enviarDatosServicios(); return false">
					<table align="center" width="99%" height="50" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
					
							<td align="right">
								Servicio :
							</td>
							<td> 
								<?php
									// Consulta la tabla servicio para obtener la lista del select
								$query_servi = "SELECT * FROM inv_servicio WHERE nombre!='Servicio de Agua'";
								//$result_servi = mysqli_query($query_servi);//
                                                                $result_servi= $db->query($query_servi);
                                                                
								?>		
								<select name="servicio" id="servicio" onchange="cargaPrecio(this.value)" class="textbox" style="width:275px;" required >
										<option value=""> - Seleccione Servicio -</option>
								<?php
									while($row_servi = mysqli_fetch_array($result_servi))
									{
										?><option value="<?php echo str_pad($row_servi['cod_servicio'],5).$row_servi['costo'];?>"><?php echo $row_servi['cod_servicio'].' '.$row_servi['nombre'];?></option><?php
										//printf("<option value='".$row_servi['cod_servicio']." '>-".$row_servi['cod_servicio'].' '.$row_servi['nombre']."</option>");
									}
									mysqli_free_result($result_servi);
								?>
								</select>
							</td>
							<td align="right">
								Valor $ :
							</td>
							<td>
								<input type="number" step="0.01" min="0.01" name="costo" id="costo" maxlength="7" class="textbox" style="width:80px;" required />&nbsp;&nbsp;&nbsp;
								<input type="hidden" name="cod_servicio" id="cod_servicio" maxlength="5" class="textbox" style="width:80px;" required />
								<input type="submit" name="agregar" value="Agregar" class="art-button"/>&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
					</table>
					</form>
					
							
					<table align="center" width="99%" height="30" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" >
						<tr background='../images/tabla_header.png' height='30'>
							<td></td>
							<td width='15%'>&nbsp;Codigo</td>
							<td width='55%'>Servicio</td>
							<td width='15%'>Valor $&nbsp;&nbsp;</td>
							<td width='15%' align="center">Acci&oacute;n &nbsp;</td>
						</tr>
					</table>
							
					<table align="center" width="99%" cellspacing="0" cellpadding="0" style="border: solid 0px #CED8F6;" >
						<tr>
							<td>
							
							<!--Dentro del div se mostrara los servicios-->
							<div id="resultado" align="center" style="width: 100%; height: 100px; overflow-x:auto; overflow-y:auto; border: 1px solid #CED8F6;" class="tabla_color">
							<?php include('consulta_otro_rec.php');?>
							
							</div>
							
							</td>
						</tr>
					</table>
					</div>
					<br>
					
					<!-- aviso de ejecusion-->
					<table align="center" width="99%" height="80" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
						<tr>
							<td align="center">
								<!--AGREGAR LOS DATOS A LA TABLA -->	
						<?php		
						if ( $_REQUEST['aplicar'] == "Aplicar" )
						{
							if( ($_POST["nombre"] == '') AND ($_POST["apellido"] == '') )//comprobar que variables no estan vacias
							{
								echo ' 
											<center>
											
											<font color="red">!N&uacute;mero de Cuenta <b>NO</b> Existe!</font>
											</center>';
									
							}
							else
							{
								$num_recibo = $_POST["num_recibo"];
								$num_cuenta = $_POST["clientID"];
								$nombre = $_POST["nombre"];
								$apellido = $_POST["apellido"];
								$fecha_cobro = date('Y-m-d');
								$fecha_pago = $_POST["vence"];
								$mes_cobrado = date('m');
								$anio_cobrado = date('Y');
																					
								//COD CUENTA						
								//obtener datos de la cuenta
								$cta = "SELECT * FROM cuenta WHERE num_cuenta='$num_cuenta'";
                                                                $result_cta = $db->query($cta);
								if($cta_ok = mysqli_fetch_array($result_cta))
								$num_cuenta = $cta_ok["num_cuenta"];
								
								
																												
								//MONTO
								//obtener monto sumando las lineas de recibo_linea_tmp
								$recibo_monto = "SELECT * FROM recibo_linea_tmp";			
                                                                $result_recibo_monto= $db->query($recibo_monto);
								while($recibo_tmp_ok = mysqli_fetch_array($result_recibo_monto))
								{
									$monto+=$recibo_tmp_ok['costo'];
								}	
								
								//RECARGO
								//obtener valor de recargo
								//$recargo_r = mysqli_query($server, "SELECT monto FROM recargo");			
								//if($recargo_ok = mysqli_fetch_array($recargo_r))
								//$recargo = $recargo_ok["monto"];
								
								$recargo = '0.00';
								$fecha_pagado = '0000-00-00';	
								
								$total_pagado = '0.00';
								
								$pagado ="NO";
								$estado="Activo";
								$anulado="NO";
								//$cod_banco =1;
								
								///////////////////////////////////////////////////////////////////////////////////////////////////////								
									
									
									
									//comprobar que no se ingrese mes actual o futuro
									/*if ($mes_cobrado >= date('m'))
									{
										echo ' 
													<center>
													<img src="../images/ico/Stop.png" width="32" height="32"><br>
													<font color="red">!Los meses futuros o el actual NO pueden ser aplicados al recibo!</font>
													</center>';
									}
									else
									{*/
										/*
										//comprobar que no se ingrese mes dos veces
										$mes_rep = mysqli_query($server, "SELECT cod_cuenta,mes,anio FROM recibo WHERE cod_cuenta='$cod_cuenta' AND mes='$mes_cobrado' AND anio='$anio_cobrado'");			
										if($mes_rep_ok = mysqli_fetch_array($mes_rep))
										{
											echo ' 
													<center>
													<img src="../images/ico/Stop.png" width="32" height="32"><br>
													<font color="red">!Ya existe cobro de servicio para mes seleccionado, <b>'.mes_letras($mes_cobrado).' '.$anio_cobrado.'</b>!</font>
													</center>';
												mysqli_free_result($mes_rep); //liberamos la memoria del query a la db
										}
										else
										{*/
											
										//comprobar que la tabla tmp de servicios esta llena	
										$query_tmp = "SELECT * FROM recibo_linea_tmp";			
                                                                                $result_query_tmp= $db->query($query_tmp);
										$numero_filas = mysqli_num_rows($result_query_tmp);
									
										if($numero_filas < 1)
										{
											echo ' 
												<center>
												<img src="../images/ico/Stop.png" width="32" height="32"><br>
												<font color="red">!No se puede generar el recibo porque No se encontraron servicios agregados!</font>
												</center>';
										mysqli_free_result($query_tmp); //liberamos la memoria del query a la db
										}
										else
										{
									
											//comprobar que no existe el recibo ingresado
											$recibo = "SELECT num_recibo FROM recibo WHERE num_recibo='$num_recibo'";
                                                                                        $result_recibo= $db->query($recibo);
											if($recibo_ok = mysqli_fetch_array($result_recibo))
											{
													echo ' 
														<center>
														<img src="../images/ico/Stop.png" width="32" height="32"><br>
														<font color="red">!N&uacute;mero de recibo <b>'.$_POST['num_recibo'].'</b> ya existe!</font>
														</center>';
												mysqli_free_result($recibo); //liberamos la memoria del query a la db
											}	
											else
											{
                                                                                                $lm_user  = remove_junk($db->escape($_POST['user_lect']));
												//$cod_empleado = $_SESSION['idempleado'];
												//insertar lectura provisional que es necesaria para agregar a recibo
												$insert_lectura = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,lectura_anterior,lectura_actual,consumo,user,cobro) 
												values ('$num_cuenta','$mes_cobrado','$anio_cobrado','$fecha_pago','0','0','0','$lm_user','c') ";
												$result_l = $db->query($insert_lectura);
                                                                                                        
												if($result_l == false)
												{
													echo '
														<center>
														
														<font color="red">! <b>Error</b>, datos No guardados, verifique por favor 1!</font>
														</center>';
														$error = mysqli_errno();	
														echo msg_error($error);	
												}
												else
												{
													//extraer cod_lectura
													$query_lectura = "SELECT cod_lectura FROM lecturas WHERE num_cuenta='$num_cuenta' AND mes='$mes_cobrado' AND anio='$anio_cobrado' AND cobro='c'";			
                                                                                                        $result_lec = $db->query($query_lectura);
													if($lectura_ok = mysqli_fetch_array($result_lec))
													{
														$cod_lectura = $lectura_ok['cod_lectura'];
												
														//introducir el nuevo registro en la tabla recibo
														$consulta = "INSERT INTO recibos (num_recibo,num_cuenta,fecha_cobro,fecha_pago,fecha_pagado,mes,anio,cod_lectura,monto,recargo,total_pagado,pagado,estado,anulado) 
														values ('$num_recibo','$num_cuenta','$fecha_cobro','$fecha_pago','$fecha_pagado','$mes_cobrado','$anio_cobrado','$cod_lectura','$monto','$recargo','$total_pagado','$pagado','$estado','$anulado') ";
														$result = $db->query($consulta); 
                                                                                                                        
                                                                                                                        
														if($result == false) 
														{
															echo '
															<center>
															
															<font color="red">! <b>Error</b>, datos No guardados, verifique por favor 2!</font>
															</center>';
															$error = mysqli_errno();	
															echo msg_error($error);
														}
														else
														{
															//obtener el cod recibo
															$recibo2 = "SELECT cod_recibo FROM recibo WHERE num_recibo='$num_recibo' AND num_cuenta='$num_cuenta' AND cod_lectura='$cod_lectura'";			
															$result_recibo2 = $db->query($recibo2); 
                                                                                                                        
                                                                                                                        if($recibo2_ok = mysqli_fetch_array($result_recibo2))
															$cod_recibo = $recibo2_ok["cod_recibo"];
															
															//EXTRAER LINEAS DE TABLA TEMPORAL
															$linea="SELECT * FROM recibo_linea_tmp";
															$resultlinea_tmp = $db->query($linea); 
                                                                                                                                
                                                                                                                                
															while($rowlinea=mysqli_fetch_array($resultlinea_tmp))
															{
																$cod_servicio_tmp = $rowlinea['cod_servicio'];
																$nombre_tmp = $rowlinea['nombre'];
																$costo_tmp = $rowlinea['costo'];
																$cod_recibo;
																
																//introducir la linea del servicio
																$consulta2 = "INSERT INTO recibo_linea (cod_recibo,cod_servicio,costo) 
																values ('$cod_recibo','$cod_servicio_tmp','$costo_tmp') ";
																$result2 = $db->query($consulta2);
                                                                                                                                        
                                                                                                                                        
																if($result2 == false) 
																{
																	
																	//$boton = 'NO';
																	echo '
																	<center>
																	<font color="red">! <b>Error</b>, datos No guardados, verifique por favor 3!</font>
																	</center>';
																	$error = mysqli_errno();	
																	echo msg_error($error);		
																	
																	//Para que no queden registros sin relacion
																	//Si no se agrego la linea del servicio que se borre el recibo																	
																	$consulta_del1 = "DELETE FROM recibo WHERE num_recibo='$num_recibo' AND num_cuenta='$num_cuenta'";
																	$borra_rec = $db->query($consulta_del1);
                                                                                                                                        
                                                                                                                                        $consulta_del2 = "DELETE FROM lectura WHERE cod_lectura='$cod_lectura' AND num_cuenta='$num_cuenta'";
                                                                                                                                        $borra_lec = $db->query($consulta_del2);
																}
																else
																{
																	/*echo '
																	<center>
																	<img src="../images/ico/Ok.png" width="32" height="32"><br>
																	<font color="green" >!El Recibo "<b>' .$_POST['num_recibo'].'</b>" se ha registrado con exito!</font><br>
																	</center>
																	';*/
																	$boton = 'SI';
																	
									
																}
																	
															}
															if($boton == 'SI')
																	{
																	?>
																	
																	<input type="button" value="Imprimir" class="art-button" onclick="javascript:window.open('../recibo/imprimir_recibo_individual.php?recibo=<?php echo $num_recibo;?>', 'imprimir_recibo', 'width=1000, height=700, scrollbars=NO')"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
																	
																																	
																	<?php	
																		echo '<font size="4" color="RED"><b>Recibo No '.$num_recibo.'</b></font>';	
																		
																		//vacias tabla tmp para que no se pueda guardar otro recibo con los mismos servicios
																		$vaciado1 = "truncate table recibo_linea_tmp";
																		$result1 = $db->query($vaciado1); 
																	}
														}////
													}
													else
													{
														echo '
															<center>
															<img src="../images/ico/Error.png" width="32" height="32"><br>
															<font color="red">! <b>Error</b>, datos No guardados, verifique por favor 4!</font>
															</center>';
															$error = mysqli_errno();	
															echo msg_error($error);		
													}
												}
											}
										}		
									/*}*/	
								/*}*/
								
							}		
						}
						else
						{
							
						
						}//fin bloque scrip guardar
							
						?>		


							</td>
						</tr>
					</table>			
					
					</Fieldset>
					
					
		
			
	</tr>	
</table>

		</td>
	</tr>
</table>		


</body>
</html>
