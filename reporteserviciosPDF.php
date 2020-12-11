<?php
   $page_title = 'Agregar Servicio';
  //require_once('config.php');
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
  //page_require_level(2);
  $sql  =("SELECT * FROM inv_servicio");
  $servicio=$db->query($sql);
  $rowgeneral = mysqli_fetch_array($servicio); 

// Deshabilitar todo reporte de errores
//error_reporting(0);  
  $sql2 = ("SELECT * FROM asociacion WHERE cod_asociacion=18");
  $asociacion1= $db->query($sql2);
  $rowgenera2 = mysqli_fetch_array($asociacion1);
  
?>
<page>
 <h3 align="center">1. Reporte de servicios</h3>
 <table width="621" border="0" align="center" cellspacing="1">
  <tr>
    <td width="325">Código:<?php echo remove_junk($rowgenera2['cod_asociacion']);?></td>
    <td width="289">Asociación:<?php echo remove_junk($rowgenera2['nom_asociacion']); ?></td>
  </tr>
  <tr>
    <td>Municipio:</td>
    <td>Dirección:</td>
  </tr>
  <tr>
    <td>Cantón:</td>
    <td>Caserío:</td>
  </tr>
  <tr>
    <td>Fecha:<?php echo date('Y-m-d'); ?></td>
    <td>Teléfono:<?php ?></td>
  </tr>
</table>

 

<table class="table table-bordered" border="1" align="center" cellpadding="3" >
            <thead>
              <tr>
                <th class="text-center" style="width: 40px;">#</th>
           <!-- <th> Imagen</th>
                <th> Descripción </th>-->
                <th class="text-center" style="width: 70px;"> Codigo </th>
                <th class="text-center" style="width: 150px;"> Servicio</th>
                <th class="text-center" style="width: 80px;"> Costo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($servicio as $servicios):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
            
                <td class="text-center"> <?php echo remove_junk($servicios['cod_servicio']); ?></td>
                <td class="text-center"> <?php echo remove_junk($servicios['nombre']); ?></td>
                <td class="text-center"> <?php echo "$".remove_junk($servicios['costo']); ?></td>
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
 $pdf -> output('reportservicios.pdf');
 }
  catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
