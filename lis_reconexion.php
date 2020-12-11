<?php
  $page_title = 'Reconexiones';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $reconexion = join_inv_reconexion_table_lista();
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
            <span>Lista de Reconexiones</span>
         </strong>
         <div class="pull-right">
           <a href="buscar_cli2.php" class="btn btn-primary">Buscar desconexiones</a>
           <a href="reportereconexion.php" class="btn btn-primary" target="_blank">Reporte</a>
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
                <th class="text-center" style="width: 10%;"> Nombre</th>
                <th class="text-center" style="width: 20%;"> Apellido</th>
                <th class="text-center" style="width: 20%;"> Fech. Orden</th>
                <th class="text-center" style="width: 20%;"> Ejecutada</th>
                <th class="text-center" style="width: 10%;"> Fech. Ejecución</th>
                <th class="text-center" style="width: 10%;"> Observación</th>
                <th class="text-center" style="width: 40px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reconexion as $reconexiones):?>
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
                <td class="text-center"> <?php echo remove_junk($reconexiones['cod_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['apellido']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['fecha_orden']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['ejecutada']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['fecha_ejecucion']); ?></td>
               <td class="text-center"> <?php echo remove_junk($reconexiones['observacion']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_reconexion.php?id=<?php echo (int)$reconexiones['cod_orden_recon'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_reconexion.php?id=<?php echo (int)$reconexiones['cod_orden_recon'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
