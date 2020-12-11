<?php
   $page_title = 'Agregar Servicio';
  
  require_once('includes/load.php');
  
  $sql  =("SELECT * FROM inv_medidor");
  $medidor=$db->query($sql);
  $rowgeneral = mysqli_fetch_array($medidor);
  $asociacion = join_asociacion1_table();
  //$numero = mysqli_num_rows($medidor);

// Deshabilitar todo reporte de errores
//error_reporting(0);  
/*  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);*/
  
?>
<page>
 <h3 align="center">Reporte de Medidores</h3>
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
              <th class="text-center" align="center" style="width: 15%;"> Código</th>
              <th class="text-center" align="center" style="width: 60px;">Número</th>
              <th class="text-center" align="center" style="width: 40px;">Marca</th>
              <th class="text-center" align="center" style="width: 60px;">Serie</th>
              <th class="text-center" align="center" style="width: 15%;">Estado</th>
              <th class="text-center" align="center" style="width: 0px;">Asignado</th>
              </tr>
            </thead>
            <tbody>
            

            <?php foreach ( $medidor as $medidores):?>
              
              <tr>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['cod_medidor']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['numero']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['cod_marca']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['serie']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['estado']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($medidores['asignado']); ?></td>
              </tr>
               
            <?php endforeach; ?>
             
            </tbody>
    </table> 
 </page> 

