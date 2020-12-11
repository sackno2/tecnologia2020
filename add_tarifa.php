<?php
  $page_title = 'Agregar Tarifa';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  //$all_categories = find_all('categories');
  //$all_photo = find_all('media');
  $tarifas = join_inv_tarifa_table();
?>
<?php
 if(isset($_POST['add_tarifa'])){
   $req_fields = array('nivel_tarifa','valor_tarifa','desde_tarifa','hasta_tarifa');
   validate_fields($req_fields);
   if(empty($errors)){
     $c_niveltarifa  = remove_junk($db->escape($_POST['nivel_tarifa']));
     $c_valortarifa  = remove_junk($db->escape($_POST['valor_tarifa']));
	 $c_desdetarifa  = remove_junk($db->escape($_POST['desde_tarifa']));
     if (is_null($_POST['hasta_tarifa']) || $_POST['hasta_tarifa'] === "") {
       $media_id = '0';
     } else {
       $c_hastatarifa = remove_junk($db->escape($_POST['hasta_tarifa']));
     }
     $date    = make_date();
     $query  = "INSERT INTO inv_tarifa (";
     $query .=" nivel, inicio, final, precio";
     $query .=") VALUES (";
     $query .=" '{$c_niveltarifa}', '{$c_desdetarifa}', '{$c_hastatarifa}', '{$c_valortarifa}' ";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE nivel='{$c_niveltarifa}'";
     if($db->query($query)){
       $session->msg('s',"Tarifa agregada exitosamente. ");
       redirect('add_tarifa.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_tarifa.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_tarifa.php',false);
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
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Tarifas por Metros Cúbicos (M³)</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_tarifa.php" class="clearfix">
            <div class="form-row"> 
            <div class="form-group col-md-6">
			<label for="nivel_tarifa">Nivel de consumo:</label>					
			<input type="text" name="nivel_tarifa" id="nivel_tarifa" class="form-control" autofocus required />
            </div>
           
            <div class="form-group col-md-5">			
			<label for="valor_tarifa">Costo: <b>$</b></label>						
			<input type="number" step="0.01" min="0.01" name="valor_tarifa" id="valor_tarifa" class="form-control" required />
            </div>
			</div>
            
             <div class="form-row"> 
            <div class="form-group col-md-4">
			<label for="desde_tarifa">Desde:</label>					
			<input type="number" name="desde_tarifa" id="desde_tarifa" class="form-control" placeholder="Metros cúbicos (M³)" autofocus required />
            
            </div>
           
            <div class="form-group col-md-4">			
			<label for="hasta_tarifa">Hasta:</label>						
			<input type="number" name="hasta_tarifa" id="hasta_tarifa" class="form-control"  placeholder="Metros cúbicos(M³)" required />
            </div>
            			
            <div class="form-group col-md-3" align="center" >
            <div class="row padding-top">
             
    <input type="submit" name="add_tarifa" id="submit" value="Guardar" class="btn btn-primary">

    <div class="pull-right">
      <a href="reportetarifaPDF.php" class="btn btn-primary" target="_blank">Reporte</a>
    </div>
    		
            </div>
            </div>
           </div> 		
          </form>

         </div>
        </div>
 <!--tabla de prueba-->
<div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px;">#</th>
           <!-- <th> Imagen</th>
                <th> Descripción </th>-->
                <th class="text-center" style="width: 15%;"> Código </th>
                <th class="text-center" style="width: 10%;"> Nivel</th>
                <th class="text-center" style="width: 15%;"> Desde(M³)</th>
                <th class="text-center" style="width: 15%;"> Hasta(M³)</th>
                <th class="text-center" style="width: 15%;"> Precio($)</th>
                <th class="text-center" style="width: 40px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tarifas as $tarifa):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            
                <td class="text-center"> <?php echo remove_junk($tarifa['cod_tarifa']); ?></td>
                <td class="text-center"> <?php echo remove_junk($tarifa['nivel']); ?></td>
                <td class="text-center"> <?php echo remove_junk($tarifa['inicio']); ?></td>
                <td class="text-center"> <?php echo remove_junk($tarifa['final']); ?></td>
                <td class="text-center"> <?php echo remove_junk($tarifa['precio']); ?></td>
            <!--<td class="text-center"> <?php //echo read_date($cliente['date']); ?></td>-->
                <td class="text-center">
                  <div class="btn-group">
                                                   
                    <a href="edit_tarifa.php?id=<?php echo (int)$tarifa['cod_tarifa'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip" id="btn2">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                    
                    
                     <a href="delete_tarifa.php?id=<?php echo (int)$tarifa['cod_tarifa'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
<!--fin de formulario -->

<!--incio prueba modal -->
<div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!--Para centrado-->
  <div class="modal-dialog modal-dialog-centered" role="document">  

<!--  <div class="modal-dialog" role="document">-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Contenido en el body
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--fin prueba modal -->
             
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
