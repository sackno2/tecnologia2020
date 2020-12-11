<?php
   $page_title = 'Reporte Valvulas';
  //require_once('config.php');
  require_once('includes/load.php');

  
  $valvula = join_inv_valvula_table();
  $asociacion = join_asociacion1_table();
 //sql de las valvulas que no se les ha dado mantenimiento//
/*  $sql  =("SELECT * FROM inv_manttoval");
  $mantenimiento=$db->query($sql);
  $rowgenera3 = mysqli_fetch_array($mantenimiento);*/ 

// Deshabilitar todo reporte de errores
//error_reporting(0);  
  
?>
<page>
 <h3 align="center">Reporte de Valvulas</h3>
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
                <!--<th class="text-center" style="width: 40px;">#</th>
            <th> Imagen</th>
                <th> Descripción </th>-->
              <th class="text-center" align="center" style="width: 0%;"> Código</th>
              <th class="text-center" align="center" style="width: 0%;">Inventario</th>
              <th class="text-center" align="center" style="width: 0px;">Marca</th>
              <th class="text-center" align="center" style="width: 90px;">Tipo</th>
              <th class="text-center" align="center" style="width: 0%;">Instalación</th>
              <th class="text-center" align="center" style="width: 0px;">Mantenimiento</th>
              <th class="text-center" align="center" style="width: 0px;">Lugar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ( $valvula as $valvulas):?>
              <tr>
              <!--<td class="text-center"><?php echo count_id();?></td>-->

                <td class="text-center" align="center"><?php echo remove_junk($valvulas['cod_valvula']); ?></td>
                <td class="text-center"><?php echo remove_junk($valvulas['num_inventario']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($valvulas['marca']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($valvulas['tipo']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($valvulas['instalacion']);?></td>

                
                <?php
               $fecha_mantto = strtotime(remove_junk($valvulas['mantenimiento']));
               $fecha_actual = strtotime(date("Y-m-d"));
               if($fecha_actual > $fecha_mantto)
                 { 
                  echo '<td class="text-center" bgcolor="#F17C7E">'. remove_junk($valvulas["mantenimiento"]).'</td>';
                  }else
                 { 
                 echo '<td class="text-center" bgcolor="#9CF7B5">'.remove_junk($valvulas["mantenimiento"]).'</td>';
                  } 
                 ?>  
                

                <td class="text-center" align="center"><?php echo remove_junk($valvulas['lugar']);?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
    </table> 
 </page> 

