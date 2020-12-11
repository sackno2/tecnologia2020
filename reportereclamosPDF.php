<?php
   $page_title = 'Reporte de Reclamos';
  
  require_once('includes/load.php');
  $reclamo = inv_reclamo_table();
  $asociacion = join_asociacion1_table();

// Deshabilitar todo reporte de errores
//error_reporting(0);  
/*  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);*/
  
?>
<page>
 <h3 align="center">Reporte de Reclamos</h3>
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
                <th class="text-center" style="width: 45px;">#</th>
                <th class="text-center" style="width: 65px;">Cuenta</th>
                <th class="text-center" style="width: 95px;">Fecha/reclamo</th>
                <th class="text-center" style="width: 55px;">Nombres</th>
                <th class="text-center" style="width: 55px;">Apellidos</th>
                <th class="text-center" style="width: 55px;">Motivo</th>
                <th class="text-center" style="width: 55px;">Solución</th>
              </tr>
            </thead>
            <tbody>
            

            <?php foreach ( $reclamo as $reclamos):?>
              
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['num_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['fecha_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['nombres_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['apellidos_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['motivo_rec']); ?></td>
                <td class="text-center"> <?php echo remove_junk($reclamos['solucion_rec']); ?></td>
              </tr>   
            <?php endforeach; ?>
            </tbody>
    </table> 
 </page> 

