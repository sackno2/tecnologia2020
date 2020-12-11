<?php
require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  error_reporting(0);
include('../includes/fechas.php');	//
include('../includes/mes_letras.php');	// 
 
  
//variables POST
  $cod=$_POST['cod_servicio'];
  $costo=$_POST['costo'];

//extraer nombre de servicio
$query_servi = "SELECT * FROM inv_servicio WHERE cod_servicio='$cod'";
$result_servi = mysqli_query($query_servi);//
if($row_servi = mysqli_fetch_array($result_servi))
$nombre = $row_servi['nombre'];

//evitar que se ingrese el servicio dos veces
$query_linea = ("SELECT * FROM recibo_linea_tmp WHERE cod_servicio='$cod'");
$result_linea = mysqli_query($server, $query_linea);//
if($row_linea = mysqli_fetch_array($result_linea))
{

}
else
{
//registra los datos del servicio en tabla tmp
   // $query  = "INSERT INTO jerarquia_tuberia (jerarquia) VALUES ('{$j_jerarquia}')";
     //$query .=" ON DUPLICATE KEY UPDATE jerarquia='{$j_jerarquia}'";
        
  $query="INSERT INTO recibo_linea_tmp (cod_servicio, nombre, costo) VALUES ('$cod', '$nombre', '$costo')";
	$db->query($query);

} 
include('consulta_otro_rec.php');
?>