<?php
   $page_title = 'Reporte Clientes';
  
  require_once('includes/load.php');
  $clientepdf = join_reporteclientepdf_table();
  $asociacion = join_asociacion1_table();

// Deshabilitar todo reporte de errores
//error_reporting(0);  
/**  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);*/
  
?>
<page>
 <h3 align="center">Reporte de Clientes</h3>
 
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
                <th class="text-center" style="width: 0px;">#</th>
                <th class="text-center" style="width: 0%;">Cuenta</th>
                <th class="text-center" style="width: 0%;">Ingreso</th>
                <th class="text-center" style="width: 0%;">Nombre</th>
                <th class="text-center" style="width: 0%;">Apellido</th>
                <th class="text-center" style="width: 0%;">Departamento</th>
                <th class="text-center" style="width: 0%;">Municipio</th>
                <th class="text-center" style="width: 0%;">DUI</th>
                <th class="text-center" style="width: 0%;">Medidor</th>
                <th class="text-center" style="width: 0%;">Estado</th>
              </tr>
            </thead>
            <tbody>
            

            <?php foreach ( $clientepdf as $clientespdf):?>
              
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['num_cuenta']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['fecha_crea']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['apellido']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['departamento']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['municipio']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['dui']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['num_medidor']); ?></td>
                <td class="text-center"> <?php echo remove_junk($clientespdf['estado']); ?></td>
              </tr>   
            <?php endforeach; ?>
            </tbody>
    </table> 
 </page> 

