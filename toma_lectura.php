<?php
$page_title = 'Toma de lecturas';
  require_once('includes/load.php');
  //require_once('includes/mes_letras.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
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
            <span>LISTADO TOMA DE LECTURAS</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
             

<body>

<table align="center" width="100%" bgcolor="white" height="530" cellspacing="1" cellpadding="0" style="border: solid 1px grey;" class="tabla_bordes"><!--tabla margen del tama�o del formulario-->
	<tr>
		<td align="center" width="300px">
		
			<fieldset class="tabla_bordes" style="border: solid 1px silver;">
					
			<!-- Formulario filtrado--> 
			<table align="center" width="99%" height="480" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" class="tabla_bordes_color">
				<tr>
					
				</tr>
				<tr>
					<tr>
					<td align="center">
                                            
					<?php echo	'<a href="listado_lectura.php?" target="iframe_report" class="btn btn-primary" />Mostrar Reporte</a>';?>
						
					</td>
				</tr>			
				</tr>
				<tr>
					<td align="center">
						<hr width="90%" style="border: solid 1px #CED8F6;">
					</td>
				</tr>
				<tr>
					
				</tr>
				
				<tr>
					<td align="center">
						<hr width="90%" style="border: solid 1px #CED8F6;">
					</td>
				</tr>
				<tr>
					<td align="center">						
						<div class="center">
                                                    <a href="lectura.php" class="btn btn-primary">Regresar</a>
                                                
                                               
                                                </div>
					</td>
				</tr>
			</table>
			</fieldset>
		</td>	
	
		<td align="center">
	
<!--===================================================================================================================================================-->  							
<!--======================================================INICIO BLOQUE DEL AREA DE TRABAJO============================================================-->
			
			<!--<embed src="../FPDF/usuario_pdf.php" width="99%" height="520">-->
			<iframe name="iframe_report" id="iframe_report" src="" value="Lectura"  scrolling="auto" color="silver" style=" background-position: 50% 50%; background-size:200px 80px; background-color: silver; border-color: silver;" width="99%" height="520" align="center" frameborder="1" >
							Su navegador no soporta iframes, se recomientda utilizar los navegadores Google Chrome o Mozilla Firefox.
			</iframe>

		</td>
	</tr>
</table>		


</body>
</html>
<?php include_once('layouts/footer.php');?>