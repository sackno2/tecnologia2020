<?php
  $page_title = 'Lista de clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $clientes = join_inv_cliente_table();
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
            <span>Lista de Clientes</span>
         </strong>
         <div class="pull-right">
           <a href="add_cliente.php" class="btn btn-primary">Agregar cliente</a>
           <a href="panel_reportes_cli.php" class="btn btn-primary" target="_blank">Reportes</a>
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
                <th class="text-center" style="width: 20%;"> No. Cuenta</th>
                <th class="text-center" style="width: 20%;"> Nombres </th>
                <th class="text-center" style="width: 20%;"> Apellidos </th>
                <th class="text-center" style="width: 10%;"> Medidor</th>
                <th class="text-center" style="width: 60px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente):?>
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
                <td class="text-center"> <?php echo remove_junk($cliente['cod_cliente']); ?></td>
                <td class="text-center"> <?php echo remove_junk($cliente['num_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($cliente['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($cliente['apellido']); ?></td>
                <td class="text-center"> <?php echo remove_junk($cliente['num_medidor']); ?></td>
            <!--<td class="text-center"> <?php //echo read_date($cliente['date']); ?></td>-->
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_cliente.php?id=<?php echo (int)$cliente['cod_cliente'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_cliente.php?id=<?php echo (int)$cliente['cod_cliente'];?>&medidor=<?php echo (int)$cliente['num_medidor'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
