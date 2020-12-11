<?php
  $page_title = 'Control de Recibos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  //$clientes = join_inv_cliente_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Control de Recibos </span>
         </strong>
        </div>
        </div>
         </div>
      </div>


             
       <table align="center" width="70%" height="450" cellspacing="0" cellpadding="1" >
							
					
                                                        
							<tr>
													
							<td align="center">
								
                                                            <a href="rec_colect.php" class="btn btn-primary" align="center">Emisi&oacute;n colectiva de recibos</a>
							</td>							
                                                        </tr>	
                                                           
                                                        <tr>
                                                        
							<td align="center">
								
                                                            <a href="rec_indiv.php" class="btn btn-primary" align="center">Emisi&oacute;n individual de recibo</a>
                                                            
							</td>							
                                                        </tr>	
                                                        
                                                        <tr>
                                                        
							<td align="center">
								
                                                            <a href="imp_colec_rec.php" class="btn btn-primary" align="center">Impresi&oacute;n colectiva de recibo</a>
                                                            
							</td>							
                                                        </tr>
                                                       
						                                           	
                                                        <tr>
							
							<td align="center" colspan="2">
								<hr width="90%" style="border: solid 1px #CED8F6;">
							</td>
                                                        </tr>
						
                                                        <tr>
							
							<td align="center">
                                                            <a href="script_nuevo_recibo.php" class="btn btn-primary">Recibos de otros servicios</a>							
							
								
							</td>							
                                                        </tr>	
                                                        
                                                        
                                                        
                                                        
                                                
                                                        <tr>
							
							<td align="center">
                                                            <a href="imp_recibo.php" class="btn btn-primary">Impresion Colectiva</a>							
							
								
							</td>							
                                                        </tr>	
                                                        <tr>
							
							<td align="center">
                                                            <a href="imp_copia_rec.php" class="btn btn-primary">Impresion Copia de recibo</a>							
							
								
							</td>							
                                                        </tr>
                                                
                                                        <tr>
							<td align="center" colspan="2">
								<hr width="90%" style="border: solid 1px #CED8F6;">
							</td>
                                                        </tr>
                                                        <tr>
							
							<td align="center">
								 <a href="home.php" class="btn btn-primary">Regresar</a>
							</td>							
                                                        </tr>	
                                                        </table>
<?php include_once('layouts/footer.php'); ?>



