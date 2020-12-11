<?php
  $page_title = 'Control de lecturas';
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
            <span>Control de Lecturas </span>
         </strong>
        </div>
        </div>
         </div>
      </div>


             
       <table align="center" width="70%" height="450" cellspacing="0" cellpadding="1" >
							
					
                                                        
							<tr>
													
							<td align="center">
								
                                                            <a href="reg_ini_lec1.php" class="btn btn-primary" align="center">Carga Inicial de lectura</a>
							</td>							
                                                        </tr>	
                                                           
                                                        <tr>
                                                        
							<td align="center">
								
                                                            <a href="toma_lectura.php" class="btn btn-primary" align="center">Listado de lectura</a>
                                                            
							</td>							
                                                        </tr>		
                                                       
						                                           	
                                                        <tr>
							
							<td align="center" colspan="2">
								<hr width="90%" style="border: solid 1px #CED8F6;">
							</td>
                                                        </tr>
						
                                                        <tr>
							
							<td align="center">
                                                            <a href="reg_lectura_mes2.php" class="btn btn-primary">Ingreso de lectura mensual</a>							
							
								
							</td>							
                                                        </tr>	
                                                        
                                                        
                                                        
                                                        
                                                
                                                        <tr>
							
							<td align="center">
                                                            <a href="list_val_lectura.php" class="btn btn-primary">Validar lecturas</a>							
							
								
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



