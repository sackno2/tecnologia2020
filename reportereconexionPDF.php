<?php
   $page_title = 'Reporte Reconexiones';
  
  require_once('includes/load.php');
  $reconexion = join_inv_reconexion_table_lista();
  $asociacion = join_asociacion1_table();
// Deshabilitar todo reporte de errores
//error_reporting(0);  
/*  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);*/
  
?>
<page>
 <h3 align="center">Reporte de Reconexiones</h3>
 <table width="621" border="0" align="center" cellspacing="1">
 <?php foreach ( $asociacion as $asociaciones):?>
  <tr>
    <td width="325">Código:<?php echo remove_junk($asociaciones['cod_asociacion']);?></td>
    <td width="289">Asociación:<?php echo remove_junk($asociaciones['nom_asociacion']); ?></td>
  </tr>
  <tr>
    <td>Departamento:<?php echo remove_junk($asociaciones['departamento']);?></td>
    <td>Municipio:<?php echo remove_junk($asociaciones['municipio']);?></td>
  </tr>
  <tr>
    <td>Dirección:<?php echo remove_junk($asociaciones['dir_asociacion']);?></td>
    <td>NIT:<?php echo remove_junk($asociaciones['nit_asociacion']);?></td>
  </tr>
  <tr>
    <td>Fecha:<?php echo date('Y-m-d'); ?></td>
    <td>Teléfono:<?php echo remove_junk($asociaciones['tel_asociacion']);?></td> 
  </tr>
  <?php endforeach; ?>
</table>

 

<table class="table table-bordered" border="1" align="center" cellpadding="2" >
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">#</th>
                <th class="text-center" style="width: 10%;"> Cuenta </th>
                <th class="text-center" style="width: 10%;"> Nombre</th>
                <th class="text-center" style="width: 20%;"> Apellido</th>
                <th class="text-center" style="width: 20%;"> Fech. Orden</th>
                <th class="text-center" style="width: 20%;"> Ejecutada</th>
                <th class="text-center" style="width: 10%;"> Fech. Ejecución</th>
              </tr>
            </thead>
            <tbody>
            

            <?php foreach ( $reconexion as $reconexiones):?>
              
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['cod_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['apellido']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['fecha_orden']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['ejecutada']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reconexiones['fecha_ejecucion']); ?></td>
              </tr>   
            <?php endforeach; ?>
            </tbody>
    </table> 
 </page> 

