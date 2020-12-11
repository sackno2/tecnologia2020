<?php
  $page_title = 'Lista de asociaciones';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $asociacion = join_asociacion_table();
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
            <span>Lista de Asociaciones</span>
         </strong>
         <div class="pull-right">
           <a href="add_asociacion.php" class="btn btn-primary">Agregar Asociacion</a>
         </div>
        </div>
<!--tabla de prueba-->
<div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 3%;">#</th>
                <th class="text-center" style="width: 50%;"> Nombre de Asociacion</th>
             
                <th class="text-center" style="width: 37%;"> Representante </th>
                <th class="text-center" style="width: 10%;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($asociacion as $asociacion):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            
                
                <td class="text-center"> <?php echo remove_junk($asociacion['nom_asociacion']); ?></td>
               
                <td class="text-center"> <?php echo remove_junk($asociacion['rep_asociacion']); ?></td>
                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_asociacion.php?id=<?php echo (int)$asociacion['cod_asociacion'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_asociacion.php?id=<?php echo (int)$asociacion['cod_asociacion'];?>"class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
