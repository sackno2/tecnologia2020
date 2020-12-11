<?php
   $page_title = 'Agregar Servicio';
  //require_once('config.php');
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
  //page_require_level(2);
  $sql  =("SELECT * FROM inv_tarifa");
  $tarifa=$db->query($sql);
  $rowgeneral = mysqli_fetch_array($tarifa); 
  $asociacion = join_asociacion1_table();
// Deshabilitar todo reporte de errores
//error_reporting(0);  
/*  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);*/
  
?>
<page>
 <h3 align="center">Reporte de Tarifas</h3>
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

 

<table class="table table-bordered" border="1" align="center" cellpadding="3" >
            <thead>
              <tr>
                <!--<th class="text-center" style="width: 40px;">#</th>
            <th> Imagen</th>
                <th> Descripción </th>-->
              <th class="text-center" align="center" style="width: 70px;"> Codigo</th>
              <th class="text-center" align="center" style="width: 150px;"> Nivel</th>
              <th class="text-center" align="center" style="width: 80px;"> Desde(M³)</th>
              <th class="text-center" align="center" style="width: 80px;"> Hasta(M³)</th>
              <th class="text-center" align="center" style="width: 80px;"> Precio</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ( $tarifa as $tarifas):?>
              <tr>
              <!--<td class="text-center"><?php echo count_id();?></td>-->

                 <td class="text-center" align="center"> <?php echo remove_junk($tarifas['cod_tarifa']); ?></td>
                <td class="text-center"><?php echo remove_junk($tarifas['nivel']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($tarifas['inicio']); ?></td>
                <td class="text-center" align="center"><?php echo remove_junk($tarifas['final']); ?></td>
                <td class="text-right" align="right"><?php echo "$".remove_junk($tarifas['precio']); ?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
    </table> 
 </page> 
<?php
 $content = ob_get_clean();
 
 require_once('html2pdf/html2pdf.class.php');
 try {
 $pdf = new HTML2PDF('P','A4','es','UTF-8');//L y P*/
 $pdf->pdf->SetDisplayMode('fullpage');
 $pdf -> writeHTML($content);
 $pdf -> pdf ->IncludeJS('print(TRUE)');
 $pdf -> output('reportarifa.pdf');
 }
  catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
