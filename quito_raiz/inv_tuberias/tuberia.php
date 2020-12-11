<?php
  $page_title = 'Listado de tuberia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $tuberias = join_inv_tuberias_table_lista();
  //$jerarquia = join_jerarquia_tuberia_table();
  //$material = join_material_tuberia_table;
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
            <span>Listado de tuberias</span>
         </strong>
         <div class="pull-right">
           <a href="add_tuberia.php" class="btn btn-primary">Agregar Tuberia</a>
         </div>
        </div>
<!--tabla-->
<div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10%;">#</th>
                <th class="text-center" style="width: 25%;"> Material</th>
                <th class="text-center" style="width: 25%;"> Jerarquia  </th>
                <th class="text-center" style="width: 15%;"> Estado </th>
                <th class="text-center" style="width: 25%;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tuberias as $tuberia):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            
                <td class="text-center"> <?php echo remove_junk($tuberia['material']); ?></td>
                <td class="text-center"> <?php echo remove_junk($tuberia['jerarquia']); ?></td>
                
                <td class="text-center"> <?php if($tuberia['estado']==="1"){ $estado1="Inventario";} else{ $estado1="Instalada";} ?> <?php echo $estado1; ?> </td>
                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_tuberia.php?id=<?php echo (int)$tuberia['cod_tuberia'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_tuberia.php?id=<?php echo (int)$tuberia['cod_tuberia'];?>"class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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