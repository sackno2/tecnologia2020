<?php
$page_title = 'Impresion de Recibos';
  require_once('includes/load.php');
  //require_once('includes/mes_letras.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   error_reporting(0);
     
   //$mes1= '';
  // $anio1=''; 
                                     
    
?>
<?php 
if(isset($_POST['imp_colec_rec'])){
    
    $mes1=$_POST['mes_r'];//agregado
   $anio1=$_POST['anio_r'];//agregado 
   $consultar = "SELECT * FROM recibos WHERE mes='$mes1' and anio= '$anio1'";
   $result_consultar= $db->query($consultar);
   $nfilas = mysqli_num_rows($result_consultar);	
   echo $nfilas;
    if ($nfilas==0){
        $boton='NO';
        $session->msg('s',"No se encontraron recibos registrados para este mes. ");
                 redirect('imp_colec_rec.php', false);
        }else{
            
            $boton='SI';
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
            <span>LISTADO DE RECIBOS A IMPRIMIR</span>
         </strong>
        </div>
       
<body>

<table align="center" width="100%" bgcolor="white" height="530" cellspacing="1" cellpadding="0" style="border: solid 1px grey;" class="tabla_bordes">
	<tr>
    <td align="center" width="175px">
		
    <fieldset class="tabla_bordes" style="border: solid 1px silver;">
					
<!-- Formulario filtrado!--> 
    <form method="post" action="imp_colec_rec.php">
                        
     <table align="center" width="50%" height="480" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
				
      <tr>
       <td align="center" width="300px">	
      <label for="mes_r">Mes:</label>
        <select id="mes_r" name="mes_r" onchange="load(this.value)"  class="form-control" required >
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
     </td>
    </tr>                  
    <tr>
    <td align="center" width="300px">
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
	<select name="anio_r" onchange="load(this.value)" class="form-control"  required >
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
        </td>
     </tr>
     <tr>
        <td align="center">
          <!-- Filtro en formulario 
         <a href="listado_rec_imp.php?mes=<?php //echo $mes1;?>& anio=<?php //echo $anio1;?> "target="iframe_report" class="btn btn-primary">Mostrar Recibos</a> 
         <a href="imp_rec_col.php?mes=<?php echo $mes1;?>&anio=<?php echo $anio1;?>"target="iframe_report" class="btn btn-primary">Mostrar Recibos</a>
         <a href="imp_rec_col.php?mes=1&anio=2020 "target="iframe_report" class="btn btn-primary">Filtrar datos</a>!-->
         <input type="submit" name="imp_colec_rec" id="submit1" value="Filtrar recibos" class="btn btn-primary">
        </td>
	</tr>			
        
        <?php
        if($boton == 'SI')
	{
	?>
        <a href="imp_rec_col.php?mes=<?php echo $mes1;?>&anio=<?php echo $anio1;?>"target="iframe_report" class="btn btn-primary">Mostrar Recibos</a>
        <!--
        <a href="imp_rec_col.php?mes=1&anio=2020 "target="iframe_report" class="btn btn-primary">Mostrar Recibos</a> 
        <a href="imp_rec_col.php?mes=<?php echo $mes1;?>&anio=<?php echo $anio1;?>"target="iframe_report" class="btn btn-primary">Mostrar Recibos</a>
        <a href="listado_rec_imp2.php?mes=<?php echo $mes1;?>&anio=<?php echo $anio1;?>"target="iframe_report" class="btn btn-primary">Mostrar Recibos</a>
        <a href="imp_rec_col.php?mes=<?php echo $mes1;?>&anio=<?php echo $anio1;?>"target="iframe_report" class="btn btn-primary">Mostrar Recibos</a>!-->
        
         <?php	}?>
	<tr>
	<td align="center">
	<hr width="90%" style="border: solid 1px #CED8F6;">
	</td>
	</tr>
	<tr>
	<td align="center">						
	<div class="center">
         <a href="recibos.php" class="btn btn-primary">Regresar</a>
        </div>
	</td>
	</tr>
	</table>
                            </form>
         </fieldset>
                                                    

		</td>	
	
		<td align="center">
	
<!--===================================================================================================================================================-->  							
<!--======================================================INICIO BLOQUE DEL AREA DE TRABAJO============================================================-->
			
			<!--<embed src="../FPDF/usuario_pdf.php" width="99%" height="520">-->
			<iframe name="iframe_report" id="iframe_report" src="" value="Recibos"  scrolling="auto" color="silver" style=" background-position: 50% 50%; background-size:200px 80px; background-color: silver; border-color: silver;" width="99%" height="520" align="center" frameborder="1" >
							Su navegador no soporta iframes, se recomientda utilizar los navegadores Google Chrome o Mozilla Firefox.
			</iframe>

		</td>
	</tr>
</table>		


</body>
</html>


 

<?php include_once('layouts/footer.php');?>