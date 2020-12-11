<?php
  $page_title = 'Reportes de Clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Reportes de Clientes</span>
        </strong>
        </div>
<!--tabla de prueba-->
<div class="panel-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><a href="panel_reportes_cli.php" class="btn btn-danger pull-left" target="_blank">1. Clientes en mora</a></td>
              
                <td><a href="panel_reportes_cli.php" class="btn btn-primary pull-left" target="_blank">2. Clientes por medidor</a></td>
              
                <td><a href="panel_reportes_cli.php" class="btn btn-warning pull-left" target="_blank">3. Lista de clientes inactivos</a></td>
              </tr>
              <tr>
                <td><a href="reporteclientes4.php" class="btn btn-primary pull-left" target="_blank">4. Lista de clientes</a></td>
              
                <td><a href="panel_reportes_cli.php" class="btn btn-primary pull-left" target="_blank">5. Lista de consumo por cliente</a></td>
              
                <td><a href="panel_reportes_cli.php" class="btn btn-primary pull-left" target="_blank">6. Lista de Clientes por fecha de activación</a></td>
              </tr>
          </tbody>
          </table>
</div>
</div>
</div> 
</div>
<?php include_once('layouts/footer.php'); ?>