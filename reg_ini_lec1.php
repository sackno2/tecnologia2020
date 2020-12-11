<?php
  $page_title = 'Carga inicial de lecturas';
  require_once('includes/load.php');
   error_reporting(0);
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $clientes = join_inv_cliente_table();
  $lecturas = join_lecturas_table();
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
            <span>Carga Inicial de Lectura</span>
         </strong>
         <div class="pull-right">
             <a href="lectura.php" class="btn btn-primary">Regresar</a>  
         </div>
         </div>
         <div class="panel-heading clearfix">
         <div class="formulario">
     	 <label for="caja_busqueda">Buscar cuenta:</label>
         <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
        </div>
        
        </div>
<!--tabla de prueba-->
<div class="panel-body">
<div id="datos">

</div>                      
</div>
<!--fin de formulario -->
      </div>
    </div>
  </div>
  <script type="text/javascript" src="libs/js/jquery.js"></script>
  <script type="text/javascript" src="libs/js/main_lec.js"></script>
  <?php include_once('layouts/footer.php'); ?>
