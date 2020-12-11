<?php
  $page_title = 'Reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$rec_cliente = find_by_id2('inv_cliente',(int)$_GET['id']); 

if(!$rec_cliente){
  $session->msg("d","Cliente no encontrado por Codigo.",$rec_cliente);
  redirect('reg_reclamo.php');
}
?>

<?php 

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>AGREGAR RECLAMO</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         
 <!--Inicio formulario principal-->       
   <form method="post" action="reg_reclamo2.php" class="clearfix"> 
 
 <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="num_cuenta">Código de cuenta</label>
      <input type="text" name="num_cuenta" class="form-control" id="num_cuenta" value="<?php echo remove_junk($rec_cliente['num_cuenta']);?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="fecha_rec">Fecha</label>
      <input type="date" name="fecha_rec" class="form-control" id="fecha_rec" placeholder="dd/mm/aaaa" autofocus >
    </div>
  </div>
  <div class="form-row"> 
  <div class="form-group col-md-6">
    <label for="nombres_rec">Nombres</label>
    <input type="text" name="nombres_rec" class="form-control" placeholder="nombres_rec" value="<?php echo remove_junk($rec_cliente['nombre']);?>" autofocus required >  
  </div>  
  
  <div class="form-group col-md-6">
      <label for="apellidos_rec">Apellidos</label>
      <input type="text" name="apellidos_rec" class="form-control" id="apellido_rec" value="<?php echo remove_junk($rec_cliente['apellido']);?>" autofocus required>
    </div>
 
  </div>
   <div class="form-row">
 	<div class="form-group col-md-6">
      <label for="motivo_rec">Motivo</label>
      <select id="motivo_rec" name="motivo_rec" class="form-control">
        <option selected>------</option>
        <option value="Factura atrazada">Factura atrazada</option>
        <option value="Medidor averiado">Medidor averiado</option>
        <option value="Cobro excesivo">Cobro excesivo</option>
        <option value="Quejas">Quejas</option>
        <option value="Daños">Daños</option>
        <option value="Robos">Robos</option>
        <option value="Abandono">Abandono</option>
        <option value="Otros">Otros</option>
      </select>
    </div>
  

    <div class="form-group col-md-6">
      <label for="asignado_medidor">Detalles</label>
      <textarea class="form-control" rows="3" name="detalle_rec" placeholder="Detalles....."></textarea>	     
    </div>
 </div>
 
  <div class="form-group col-md-12">
      <label for="solucion_rec">SOLUCIONADO</label>
      <select name="solucion_rec" id="solucion_rec">
        <option value="NO" selected>NO</option>
        <option value="SI">SI</option>
      </select>	     
  </div>
 
  <div class="row">
      <div class="form-group col-md-4" align="left">
      <input type="submit" name="submit1" id="submit1" value="Buscar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="center">
      <input type="submit" name="reg_reclamo" id="submit" value="Guardar" class="btn btn-primary">
      </div>
      <div class="form-group col-md-4" align="right">
      <input type="submit" name="submit3" id="submit3" value="Reporte" class="btn btn-primary">
    </div>
  </div>

 </form> 
 
<!--Hasta aqui el formulario -->
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
