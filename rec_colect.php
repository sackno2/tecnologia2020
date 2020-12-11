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

<?php
//Calculo de fecha de vencimiento
//if(isset($_POST['filtro_rec']))
    //{$dia_fv='15';


//$mes_fv='07';
//$mes_fv= $_POST['mes'];
//$anio_fv='2020';
//$anio_fv= $_POST['anio'];
//$fv = new DateTime ($anio_fv.'-'.$mes_fv.'-'.$dia_fv);
//$fv = strtotime($anio_fv.'-'.$mes_fv.'-'.$dia_fv);
//$fvf = new DateTime ($fv);
//$fv = $fv->format('Y-m-d');
// $val_dia = date('N', strtotime($fv));
 //echo $val_dia;
 

//if ($val_dia == 6) {
        //$n_fv=  strtotime($fv1."+ 2 days");
       // $n_fv = strtotime ( '+2 day' , strtotime ( $fv ) ) ;
       // $n_fv = date ( 'Y-m-d' , $n_fv );
      //  echo $n_fv;
        
        
//} elseif ($val_dia == 7) {
    //$n_fv=  strtotime($fv1."+ 1 days");
   // $n_fv = strtotime ( '+1 day' , strtotime ( $fv ) ) ;
   // $n_fv = date ( 'Y-m-d' , $n_fv );
    //    echo $n_fv;
//} else {
   // $n_fv=$fv;
//}
//}

 //echo $val_dia;
                //echo  $fv;
                //echo $n_fv;
                
                //echo $fv1;
              

						
                                               

?>




<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Emision de recibos colectivos</span>
         </strong>
      </div>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
<!--Inicio formulario principal-->       
<form method="post" action="rec_colect.php" class="clearfix"> 
 <div class="form-row">
 	<div class="form-group col-md-4">
      <label for="mes_r">Mes:</label>
        <select id="mes" name="mes_r" onchange="enviar_mes(this.value)" class="form-control" required >
	<option value='1'> 1-Enero</option>
	<option value='2'> 2-Febrero</option>
	<option value='3'> 3-Marzo</option>
	<option value='4'> 4-Abril</option>
	<option value='5'> 5-Mayo</option>
	<option value='6'> 6-Junio</option>
	<option value='7'> 7-Julio</option>
	<option value='8'> 8-Agosto</option>
	<option value='9'> 9-Septiembre</option>
	<option value='10'>10-Octubre</option>
	<option value='11'>11-Noviembre</option>
	<option value='12'>12-Diciembre</option>
	</select>

        </div>
     
         
     <div class="form-group col-md-4">
      <label for="anio_r">A&ntilde;o:</label>
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
									<select name="anio_r" class="form-control"  required >
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
        <label for="fecha_vto">Fecha de vencimiento</label>
        <input type="date" name="fecha_vto" class="form-control" id="fecha_vto"  required>
        </div>
     </div>
     
     <div class="form-row">
        <div class="form-group col-md-4">
        <label for="num_recibo">Ultimo recibo:</label>
              <?php
		$query_rec= "SELECT * FROM recibos";
                $result_rec= $db->query($query_rec);
                $row = mysqli_fetch_array($result_rec);
                if ($row==0)
                {   $ultimo_recibo=0;
                 
                    
                    
                }else{ 
                    
                 // $ultimo_recibo=1;  
                  $query_un = "SELECT MAX(num_recibo) AS num_recibo1 FROM recibos";
                  $result_un = $db->query($query_un);
                  $row = mysqli_fetch_array($result_un);
                  $ultimo_recibo= $row['num_recibo1'];
                  //echo $ultimo_recibo;
               }
              
               ?>
        <input type="number" name="num_recibo" value='<?php echo $ultimo_recibo;?>' class="form-control" id="num_recibo" readonly>
          
        
     
								
        </div>
                 
	<div class="form-group col-md-4">
        <label for="num_ini_rec">Numero Inicial:</label>
        
        <?php
		$num_inicial = $ultimo_recibo+1;
              
               ?>
        <input type="number" name="num_ini_rec" class="form-control" value='<?php echo $num_inicial;?>' id="num_cuenta" autofocus required>
        
        
        
        </div>
     
     
       <div class="form-group col-md-4" align="right">
      <input type="submit" name="filtro_rec" id="submit1" value="Lista de recibo" class="btn btn-primary">
      </div>
     </div>
         
     <div class="row">
     <div class="col-md-12">  
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 5%;">#</th>
           <!-- <th> Imagen</th>
                -->
                
                <th class="text-center" style="width: 15%;"> No. Cuenta</th>
                <th class="text-center" style="width: 15%;"> Mes </th>
                 <th class="text-center" style="width: 10%;"> A&ntilde;o </th>
                <th class="text-center" style="width: 10%;"> Fecha Lectura </th>
                <th class="text-center" style="width: 10%;"> Lectura Anterior </th>
                <th class="text-center" style="width: 10%;"> Lectura Actual</th>
                <th class="text-center" style="width: 10%;"> Consumo</th>
                <th class="text-center" style="width: 10%;"> Valor </th>
              </tr>
            </thead>
            <tbody>
                
            <div>
                <?php
						
                      //if(isset($_POST['rec_colect'])){
                                                        $mes1=$_POST['mes_r'];
                                                
                                                   $anio1=$_POST['anio_r'];
								//}       
                                               
						$nfilas=0;
                                                
                                                                                             
                                                
						$cliente = "SELECT * FROM inv_cliente WHERE estado='1' ORDER BY num_cuenta ASC";
						$result_client= $db->query($cliente);
                                                $nfilas = mysqli_num_rows($result_client);
                                               // echo ($nfilas);
						echo'<table align="center" width="100%" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" >';
						if($nfilas!=0)
						{
                                                    
							$num_fila = 0;
							$n=0;
							while($Datos = mysqli_fetch_array($result_client))
							{
								//comprobar que existe lectura para el mes
								$mes_lec = "SELECT num_cuenta,mes,anio FROM lecturas WHERE num_cuenta='$Datos[num_cuenta]' AND mes='$mes1' AND anio='$anio1' AND cobro!='v'";			
                                                                $result_mes_lec= $db->query($mes_lec);
								if($mes_lec_ok = mysqli_fetch_array($result_mes_lec))
								{
								
								
									$n=$n+1;
									//$consultarcliente = mysqli_query($server, "SELECT * FROM lectura where cod_cuenta='$Datos[cod_cuenta]' AND mes='$mes1' AND anio='$anio1' AND cobro!='OS'");
									$consultarcliente = "SELECT * FROM lecturas where num_cuenta='$Datos[num_cuenta]' AND mes='$mes1' AND anio='$anio1' AND cobro!='v'";
									$r_consultarcliente = $db->query($consultarcliente);
                                                                        $DatosCliente = mysqli_fetch_array($r_consultarcliente);

									//$consultarconsumo = mysqli_query($server, "SELECT * FROM lectura where cod_cuenta='$Datos[cod_cuenta]' AND mes='$mes1' AND anio='$anio1' AND cobro!='OS' ORDER BY mes DESC LIMIT 0,1");
                                                                        $consultarconsumo = "SELECT * FROM lecturas where num_cuenta='$Datos[num_cuenta]' AND mes='$mes1' AND anio='$anio1' AND cobro!='v' ORDER BY mes DESC LIMIT 0,1";
									$r_consultarconsumo= $db->query($consultarconsumo);
                                                                        $DatosConsumo = mysqli_fetch_array($r_consultarconsumo);

									$arrays_num_cuenta[$n] = $Datos["num_cuenta"];

							
									$bgcolor1 = " '#CED8F6' "; // color sobre seleccion 
									$bgcolor2 = " '#ffffff' ";// color original blanco 
									$bgcolor3 = " '#EEE9FD' ";// color original 2
									echo '<tr '; 
									if ($num_fila%2==0) 
									 echo 'bgcolor=#ffffff onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor2.';"' ; //si el resto de la divisi�n es 0 pongo un color 
									else 
									 echo 'bgcolor=#EEE9FD onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor3.';"'; //si el resto de la divisi�n NO es 0 pongo otro color 
																 
										echo '> '; 
										
										echo"
											<td ></td>
											<td class='text-center'>&nbsp;&nbsp;$n</td>
											<td width='15%'>$DatosCliente[num_cuenta]</td>
											<td width='15%'>$DatosCliente[mes]</td>
											<td width='10%'>$DatosCliente[anio]</td>
                                                                                        <td width='10%'>$DatosCliente[fecha_lectura]</td>    
											<td width='10%'>$DatosCliente[lectura_anterior]</td>
											<td width='10%'>$DatosCliente[lectura_actual]</td>
											<td width='10%'>$DatosCliente[consumo]</td>
											";
										//$tarifa = mysqli_query($server, "SELECT * FROM tarifa where ($DatosCliente[consumo]>= inicio and $DatosCliente[consumo]<=final)");			
										$tarifa = "SELECT * FROM inv_tarifa where ($DatosCliente[consumo]>= inicio and $DatosCliente[consumo]<=final)";			
										$r_tarifa= $db->query($tarifa);
                                                                                $tarifa_ok = mysqli_fetch_array($r_tarifa);
										
										echo"
										<td width='10%' align='center'>$$tarifa_ok[precio]&nbsp;&nbsp;</td>
										
										</tr>
									
										";
										$num_fila++; 
								
										echo"
									
									
									<input type='hidden' name='num_cuenta$n' value='$Datos[num_cuenta]'>
									<input type='hidden' name='cod_lectura$n' value='$DatosConsumo[cod_lectura]'>
									<input type='hidden' name='tarifa$n' value='$tarifa_ok[precio]'>
									<input type='hidden' name='n' value='$n'>
									";
								}
								
								else
								{
									$lecturas = 'NO';
								}	
									
								
							}
									if($lecturas == 'NO')
										{
											echo '<br><br> 
											<center>
											
											<font color="red">!No se pueden Generar los Recibos porque no existen lecturas para el mes seleccionado, <b></b>!</font>
											</center><br><br>';
												
										}
                                                                                
						
						}
									//mysqli_close();	
							?>
          
            </tbody>
          </table>
        </div>
       </div>
            
            
   </div>
            <div class="row">
            <div class="form-group col-md-6" align="left">
            <input type="submit" name="rec_colect" id="submit" value="Guardar" class="btn btn-primary">
            </div>
            
            <div class="form-group col-md-6" align="right">
                <a href="recibos.php" class="btn btn-primary">Regresar</a>
           </div>
            </div>	
    
  </div>

 



  </div>      
               
<!--Fin formulario principal-->

<table align="center" width="85%" height="70" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
						<tr>
                                                    
                                                    <td width="40%" align="right">
									<input type='hidden' name='mes2' value='<?php echo $mes1;?>' > 
									<input type='hidden' name='anio2' value='<?php echo $anio1;?>' > 
									<input type='hidden' name='numero2' value='<?php echo $_POST["num_ini_rec"];?>' >									
							  		<input type='hidden' name='fecha_pago2' value='<?php echo $_POST["fecha_vto"];?>'>
                                                    
							<td align="center">
								<!--AGREGAR LOS DATOS A LA TABLA -->
					<?php
						if ( $_REQUEST['rec_colect'] == "Guardar" )
                                               // if(isset($_POST['rec_colect']))
						{
						
						
								
							$nn= 0;
							//calcular el ultimo dia del mes para fecha lectura
									function getUltimoDiaMes($elAnio,$elMes) {
									return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
										}
							
                                                             $consultarrecargo = "SELECT * FROM recargo";
                                                             $result_recargo = $db->query($consultarrecargo);
                                                            $row_recargo= mysqli_fetch_array($result_recargo);
                                                            $recargo= $row_recargo["monto"];                       
                                                                                
								
							// consulta el ultimo registro de la tabla recibo
						//$rs = mysqli_query($server, "SELECT MAX(cod_recibo) AS id FROM recibo");
						$rs = "SELECT MAX(cod_recibo) AS id FROM recibos";
                                                $result_rs=$db->query($rs);
                                                if ($row = mysqli_fetch_row($result_rs)) {
						$recibo= trim($row[0]);
						}
						
												
							$cod_recibo2 = $recibo+1;			
							$num_recibo = $_POST["numero2"];
							
							//$cod_recibo = $_POST["linea$nn"];		
						
							$fecha_pago = $_POST["fecha_pago2"];	//modificado								
							
							while($nn < $_POST["n"])
							{
								
										
								
									$nn=$nn+1;
									//$cod_bloque = $_POST["cod_bloque"];
									$num_cuenta = $_POST["num_cuenta$nn"];
									$cod_lectura = $_POST["cod_lectura$nn"];
									$mes = $_POST["mes2"];  
									$anio = $_POST["anio2"]; 
									$monto = $_POST["tarifa$nn"];
									$pagado ="NO";
									$estado="Activo";
									$anulado="NO";
									//$cod_banco =1;
									$fecha_pagado = '0000-00-00';
                                                                        $total_pagado ='0.00';
									$cod_servicio="1";
												
											
									
									//Ejemplo de uso ultimo dia
									$ultimoDia = getUltimoDiaMes($anio,$mes);
									$fecha_lectura = $anio.'-'.$mes.'-'.$ultimoDia;
								
																	
									//comprobar si mes a ingresar no se ha registrado
									//$consulta_mes = mysqli_query($server, "SELECT * FROM recibo WHERE mes='$mes' AND anio='$anio' AND cod_cuenta=$cod_cuenta");
									
                                                                        $consulta_mes = "SELECT * FROM recibos WHERE mes='$mes' AND anio='$anio' AND num_cuenta=$num_cuenta";
                                                                        $resultado_mes = $db->query($consulta_mes);
									
                                                                        if($row_mes = mysqli_fetch_array($resultado_mes))
									{									
										
										$boton = 'NO';				
										 	
									}
									else
									{
										//comprobar que no existe el recibo ingresado
										//$recibo = mysqli_query($server, "SELECT num_recibo FROM recibo WHERE num_recibo='$num_recibo'");			
										$recibo = "SELECT num_recibo FROM recibos WHERE num_recibo='$num_recibo'";			
										$result_recibo= $db->query($recibo);
                                                                                if($recibo_ok = mysqli_fetch_array($result_recibo))
										{
											$boton = 'RECIBO';		
												mysqli_free_result($recibo); //liberamos la memoria del query a la db
										}
										else
										{
											//if(mysqli_query($server, "INSERT INTO recibo (num_recibo,cod_cuenta,fecha_cobro,fecha_pago,fecha_pagado,mes,anio,cod_lectura,monto,recargo,pagado,estado,anulado)
											//  VALUES('$num_recibo','$cod_cuenta','$fecha_lectura','$fecha_pago','$fecha_pagado','$mes','$anio','$cod_lectura','$monto','$recargo','$pagado','$estado','$anulado')"));
												
                                                                                        
                                                                                        
                                                                                        $inserta  = "INSERT INTO recibos (num_recibo,num_cuenta,fecha_cobro,fecha_pago,fecha_pagado,mes,anio,cod_lectura,monto,recargo,total_pagado,pagado,estado,anulado)
												  VALUES('$num_recibo','$num_cuenta','$fecha_lectura','$fecha_pago','$fecha_pagado','$mes','$anio','$cod_lectura','$monto','$recargo',$total_pagado,'$pagado','$estado','$anulado')";
                                                                                                
                                                                                        if ($db->query($inserta))
                                                                                        
                                                                                        { 	
													$inserta1= "INSERT INTO recibo_linea (cod_recibo,cod_servicio,costo)		
                                                                                                                    VALUES('$cod_recibo2','$cod_servicio', '$monto')";
												if ($db->query($inserta1))
												{ 
													$boton = 'SI';		
												
												}
												else
												{
													$boton = 'ERROR';		
												}
										}	
                                                                                
                                                                                                }	
									}		
																	
									$num_recibo=$num_recibo+1;
									$cod_recibo2=$cod_recibo2+1;
									if($nn == 1)
									{									
									//echo"
									//<a href='imprimirrecibos.php?cod_bloque=$cod_bloque' class='art-button' title='Imprimir Recibos'>Imprimir</a>&nbsp;&nbsp;&nbsp;&nbsp;									
									//";
										
										
										if($boton == 'NO')
										{
											echo '
												<center>
												<font color="red">!Los Recibos del Mes seleccionado ya fueron ingresados.!</font>
												</center>';
												
										}
										
										else if($boton == 'SI')
										{
											?><input type="button" value="Imprimir" class="btn btn-primary" onclick="javascript:window.open('imprimirrecibos.php?cod_bloque=<?php echo $cod_bloque;?>&mes=<?php echo $mes;?>&anio=<?php echo $anio;?>', 'imprimir_recibos', 'width=1000, height=700, scrollbars=NO')"><?php		
										
                                                                                         
                                                                                }
										
										else if($boton == 'RECIBO')
										{
											echo '
												<center>
												<font color="red">!N&uacute;meros de recibo ya existen!</font>
												</center>';
												
										}
										
										else if($boton = 'ERROR') 
										{	echo '
												<center>
												<font color="red">! <b>Error</b>, datos No guardados, verifique por favor !</font>
												</center>'.mysqli_error();
												$error = mysqli_errno();	
												echo msg_error($error);
										}		
									}
								
									
									
									
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

						
				
					</td>							
				</tr>	
			</table>
		</td>
	</tr>	
</table>

		</td>
	</tr>
</table>		

</form>  
</body>
</html>




		
         </div>
        </div>
      </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
