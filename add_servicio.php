<?php
  $page_title = 'Agregar Servicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $servicios = join_inv_servicio_table();
?>
<?php
 if(isset($_POST['add_servicio'])){
   $req_fields = array('nom_servicio','valor_servicio');
   validate_fields($req_fields);
   if(empty($errors)){
     $c_servicio  = remove_junk($db->escape($_POST['nom_servicio']));
     
     if (is_null($_POST['valor_servicio']) || $_POST['valor_servicio'] === "") {
       $media_id = '0';
     } else {
       $c_valor = remove_junk($db->escape($_POST['valor_servicio']));
     }
     $date    = make_date();
     $query  = "INSERT INTO inv_servicio (";
     $query .=" nombre, costo";
     $query .=") VALUES (";
     $query .=" '{$c_servicio}', '{$c_valor}' ";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE nombre='{$c_servicio}'";
     if($db->query($query)){
       $session->msg('s',"Servicio agregado exitosamente. ");
       redirect('add_servicio.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('add_servicio.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_servicio.php',false);
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
            <span>Agregar servicio</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_servicio.php" class="clearfix">
            <div class="form-row"> 
            <div class="form-group col-md-6">
			      <label for="nom_servicio">Nombre :</label>					
			      <input type="text" name="nom_servicio" id="nom_servicio" class="form-control" autofocus required />
             </div>
           
            <div class="form-group col-md-3">			
			      <label for="valor_servicio">Precio: <b>$</b></label>						
			      <input type="number" step="0.01" min="0.01" name="valor_servicio" id="valor_servicio" class="form-control" required />
            </div>
						
            <div class="form-group col-md-3" align="center" >
            <div class="pull-right">
            <a href="reporteserviciosPDF.php" class="btn btn-primary">Reporte</a>
            </div> 
            <div class="pull-right">
            <input type="submit" name="add_servicio" id="submit" value="Guardar" class="btn btn-primary">
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
                <th class="text-center" style="width: 10%;"> Codigo </th>
                <th class="text-center" style="width: 30%;"> Servicio</th>
                <th class="text-center" style="width: 20%;"> Costo</th>
                <th class="text-center" style="width: 40px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($servicios as $servicio):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            
                <td class="text-center"> <?php echo remove_junk($servicio['cod_servicio']); ?></td>
                <td class="text-center"> <?php echo remove_junk($servicio['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($servicio['costo']); ?></td>
                
            <!--<td class="text-center"> <?php //echo read_date($cliente['date']); ?></td>-->
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_servicio.php?id=<?php echo (int)$servicio['cod_servicio'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_servicio.php?id=<?php echo (int)$servicio['cod_servicio'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
