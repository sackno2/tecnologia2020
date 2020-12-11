<?php
  $page_title = 'Reporte de cliente';
  ob_start();
  require_once('includes/load.php');
  require_once(dirname(__FILE__)."/html2pdf/html2pdf.class.php");
  $asociacion = join_asociacion1_table();
  $cliente1 = find_by_id2('reportecliente2pdf',$_GET['id']);
  if(!$cliente1){
   $session->msg("d","Cliente no encontrado por Codigo.",$cliente1);
  redirect('cliente.php');
 }
?>
<style type="text/css">
<!--
/* commentaire dans un css */
table, td { border: solid 0px #000000; color: #0000AA; }
td.col1   { color: #00AA00; }

/* autre commentaire */
table.liste         { border: solid 2px #FF0000; }
table.liste td      { background: #DDDDDD; }
table.liste td.col1 { color: #FF0000; }
-->
</style>
<page style="font-size: 15px"> <!--Inicio página PDF--> 
   <table style="width: 50%;border: solid 2px #5544DD" align="center">
    <tr>
     <td style="width: 40%; text-align: center;"><img align="center" src="./libs/images/logo.png" alt="Logo" width=70 /><br></td>
    </tr>
   </table>

<h3 align="center">Reporte de Cliente</h3>
 <!--Inicio formulario principal--> 
<table width="621" class="liste" border="0" align="center" cellspacing="10">
   <?php foreach ( $asociacion as $asociaciones):?>
  <tr>
    <td width="325">Código:<b><?php echo remove_junk($asociaciones['cod_asociacion']);?></b></td>
    <td width="289">Asociación:<b><?php echo remove_junk($asociaciones['nom_asociacion']); ?></b></td>
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

 <h4 align="center">
  <span style="font-weight: bold; font-size: 14pt; color: #0000AA; font-family: Arial"> 
  Datos generales del Cliente
  <br></span>
 </h4>
 <table width="621" class="liste" border="0" align="center" cellspacing="10">
 <tbody> 
  <tr>     
    <td>Código Cliente:<b><?php echo remove_junk($cliente1['cod_cliente']);?></b></td>  
    <td>No. Cuenta:<?php echo remove_junk($cliente1['num_cuenta']);?></td>
    <td>Fecha de inscripción:<?php echo remove_junk($cliente1['fecha_crea']);?></td>
  </tr>
  <tr>
    <td>Nombres:<?php echo remove_junk($cliente1['nombre']);?></td>
    <td>Apellidos:<?php echo remove_junk($cliente1['apellido']);?></td>
    <td>Fecha de Nacimiento:<?php echo remove_junk($cliente1['fecha_naci']);?></td>
  </tr>
  <tr>
    <td>Dirección:<?php echo remove_junk($cliente1['direccion']);?></td>
  </tr>
  <tr>
    <td>Departamento:<?php echo remove_junk($cliente1['departamento']);?></td>
    <td>Municipio:<?php echo remove_junk($cliente1['municipio']);?></td>
    <td>Sexo:<?php echo remove_junk($cliente1['sexo']);?></td>
  </tr>
  <tr> 
    <td>DUI:<?php echo remove_junk($cliente1['dui']);?></td> 
    <td>Teléfono:<?php echo remove_junk($cliente1['telefono']);?></td>
    <td>Celular:<?php echo remove_junk($cliente1['celular']);?></td>
  </tr>
  <tr>
    <td>NIT:<?php echo remove_junk($cliente1['nit']);?></td>
  </tr>
  <tr>
    <td>Correo electrónico:<?php echo remove_junk($cliente1['mail']);?></td>
  </tr>
  <tr>
    <td>Medidor:<?php echo remove_junk($cliente1['num_medidor']);?></td> 
    <td>Lectura inicial:<?php echo remove_junk($cliente1['lectura_ini']);?></td>
    <td>Estado:<?php echo remove_junk($cliente1['estado']);?></td>
  </tr>
<!--Hasta aqui el formulario -->
  </tbody>
 </table>
</page>
<?php
$content = ob_get_clean();
 // convert to PDF   
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "es");
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->pdf->SetDisplayMode("fullpage");
        $html2pdf->writeHTML($content, isset($_GET["vuehtml"]));
        $html2pdf->Output("reportecliente1.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
