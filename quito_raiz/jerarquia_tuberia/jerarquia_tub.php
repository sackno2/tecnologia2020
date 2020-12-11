<?php
  $page_title = 'Lista de jeraquia de tuberias';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $jerarquia = join_jerarquia_tuberia_table();
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
            <span>Lista de jerarquia de tuberia</span>
         </strong>
         <div class="pull-right">
           <a href="add_jerarquia_tub.php" class="btn btn-primary">Agregar jerarquia</a>
         </div>
        </div>
<!--tabla de prueba-->
<div class="panel-body">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px;">#</th>      
                <th class="text-center" style="width: 20px;"> Jerarquia</th>
                <th class="text-center" style="width: 60px;"> Acciones </th>
              </tr>
            </thead>
            
            <tbody>
              <?php foreach ($jerarquia as $jerarquia):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                         
                <td class="text-center"> <?php echo remove_junk($jerarquia['jerarquia']); ?></td>
                
            
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_jerarquia_tub.php?id=<?php echo (int)$jerarquia['cod_jerarquia'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_jerarquia_tub.php?id=<?php echo (int)$jerarquia['cod_jerarquia'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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