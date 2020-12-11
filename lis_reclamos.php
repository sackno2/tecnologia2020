<?php
  $page_title = 'Lista de reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $reclamo = inv_reclamo_table();
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
            <span>Lista de reclamos</span>
         </strong>
         <div class="pull-right">
           <a href="reclamo.php" class="btn btn-primary">Buscar cliente</a>
            <a href="reportereclamos.php" class="btn btn-primary" target="_blank">Reporte</a>
         </div>
        </div>
<!--tabla de prueba-->
<div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">#</th>
           <!-- <th> Imagen</th>
                <th> Descripción </th>-->
                <th class="text-center" style="width: 10%;"> Cuenta </th>
                <th class="text-center" style="width: 10%;"> Fecha/reclamo</th>
                <th class="text-center" style="width: 20%;"> Nombres</th>
                <th class="text-center" style="width: 20%;"> Apellidos</th>
                <th class="text-center" style="width: 20%;"> Motivo</th>
                <th class="text-center" style="width: 10%;"> Solución</th>
                <th class="text-center" style="width: 40px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reclamo as $reclamos):?>
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
                <td class="text-center"> <?php echo remove_junk($reclamos['num_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['fecha_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['nombres_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['apellidos_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['motivo_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['solucion_rec']); ?></td>
            <!--<td class="text-center"> <?php //echo read_date($cliente['date']); ?></td>-->
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_reclamo.php?id=<?php echo (int)$reclamos['cod_reclamo'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_reclamo.php?id=<?php echo (int)$reclamos['cod_reclamo'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
