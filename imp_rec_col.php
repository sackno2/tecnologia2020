<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
$mes=$_POST['mes'];//agregado
$anio=$_POST['anio'];//agregado
// 
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/listado_rec_imp2.php');
    $content = ob_get_clean();

    // convert in PDF
     //require_once('html2pdf/html2pdf.class.php');
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'letter', 'es', 'UTF-8');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('recibos.pdf');
        // $html2pdf->pdf->SetDisplayMode('fullpage');
       //  $html2pdf->pdf ->IncludeJS('print(TRUE)');
      
        
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
