<?php
  $page_title = 'Lista de medidores';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $medidores = join_inv_medidor_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Lista de medidores</span>
         </strong>
         
         <div class="pull-right">
          <a href="add_medidor.php" class="btn btn-primary">Agregar Medidor</a>
          <a href="reportemedidor.php" class="btn btn-primary" target="_blank">Reporte</a>
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
                <th class="text-center" style="width: 10%;"> Código </th>
                <th class="text-center" style="width: 15%;"> Numero</th>
                <th class="text-center" style="width: 10%;"> Cod. Marca</th>
                <th class="text-center" style="width: 20%;"> Serie</th>
                <th class="text-center" style="width: 10%;"> Estado</th>
                <th class="text-center" style="width: 10%;"> Asignado</th>
                <th class="text-center" style="width: 60px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($medidores as $medidor):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            <!--<td>
                  <?php //if($cliente['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?//php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php //echo $product['image']; ?>" alt="">
                <?php //endif; ?>
                </td>
                <td> <?php //echo remove_junk($cliente['name']); ?></td>-->
                <td class="text-center"> <?php echo remove_junk($medidor['cod_medidor']); ?></td>
                <td class="text-center"> <?php echo remove_junk($medidor['numero']); ?></td>
                <td class="text-center"> <?php echo remove_junk($medidor['cod_marca']); ?></td>
                <td class="text-center"> <?php echo remove_junk($medidor['serie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($medidor['estado']); ?></td>
                <td class="text-center"> <?php echo remove_junk($medidor['asignado']); ?></td>
            <!--<td class="text-center"> <?php //echo read_date($cliente['date']); ?></td>-->
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_medidor.php?id=<?php echo (int)$medidor['cod_medidor'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_medidor.php?id=<?php echo (int)$medidor['cod_medidor'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
