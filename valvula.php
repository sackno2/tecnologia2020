<?php
  $page_title = 'Lista de Válvulas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $valvulas = join_inv_valvula_table();
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
            <span>Lista de Válvulas</span>
         </strong>
         <div class="pull-right">
           <a href="add_valvula.php" class="btn btn-primary">Agregar Válvula</a>
           <a href="reportevalvula.php" class="btn btn-primary" target="_blank">Reporte</a>
         </div>
        </div>
<!--tabla de prueba-->
<div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px;">Código</th>
           <!-- <th> Imagen</th>
                <th> Descripción </th>-->
                <th class="text-center" style="width: 10%;"> Inventario </th>
                <th class="text-center" style="width: 30%;"> Tipo</th>
                <th class="text-center" style="width: 10%;"> Instalación</th>
                <th class="text-center" style="width: 10%;"> Mantenimiento</th>
                <th class="text-center" style="width: 30%;"> Lugar</th>
                <th class="text-center" style="width: 60px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($valvulas as $valvula):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($valvula['cod_valvula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($valvula['num_inventario']); ?></td>      
                <td class="text-center"> <?php echo remove_junk($valvula['tipo']); ?></td>
                <td class="text-center"> <?php echo remove_junk($valvula['instalacion']); ?></td>
                <?php
				 $fecha_mantto = strtotime(remove_junk($valvula['mantenimiento']));
				 $fecha_actual = strtotime(date("Y-m-d"));
				 if($fecha_actual > $fecha_mantto)
	               { 
	                echo '<td class="text-center" bgcolor="#F17C7E">'. remove_junk($valvula["mantenimiento"]).'</td>';
	             }else
		           { 
		           echo '<td class="text-center" bgcolor="#9CF7B5">'.remove_junk($valvula["mantenimiento"]).'</td>';
		        }	
				   ?>
                
                <td class="text-center"> <?php echo remove_junk($valvula['lugar']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_valvulas.php?id=<?php echo (int)$valvula['cod_valvula'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_cliente.php?id=<?php echo (int)$valvula['cod_valvula'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
