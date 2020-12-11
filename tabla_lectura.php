<?php
  $page_title = 'Ingreso de Lecturas Mensual';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php							
 
function mes_letras($mes)
 {
    switch($mes) 
   {
      case "1":
         $month = "Enero";
         break;
      case "2":
         $month = "Febrero";
         break;
      case "3":
         $month = "Marzo";
         break;
      case "4":
         $month = "Abril";
         break;
      case "5":
         $month = "Mayo";
         break;
      case "6":
         $month = "Junio";
         break;
      case "7":
         $month = "Julio";
         break;
      case "8":
         $month = "Agosto";
         break;
      case "9":
         $month = "Septiembre";
         break;
      case "10":
         $month = "Octubre";
         break;
      case "11":
         $month = "Noviembre";
         break;
      case "12":
         $month = "Diciembre";
         break;
   }
   
   return $month;
}

?>

<?php
//include('../includes/mes_letras.php');	//
error_reporting (0);					
   // $filtro=$_POST['mes'];
    //$filtro2=$_POST['anio'];
    //$proveedor = "";
    $nfilas=0;

    $consultar = join_lecturas_table();
    //$cliente = join_lecturas_table_lista();
    $nfilas = mysqli_num_rows($consultar);	
    echo'<table id="datos" align="center" width="100%" cellspacing="0" cellpadding="0" style="border: solid 1px #CED8F6;" >';
    if($nfilas!=0)
	{
						
	$num_fila = 0;
	$n=0;
	while($Datos = mysqli_fetch_array($consultar))
            {
            $n=$n+1;
           // $consultarcliente = mysqli_query($server, "SELECT * FROM cliente where cod_cliente='$Datos[cod_cliente]'");
            
            $cliente = join_lecturas_table_lista();
            $DatosCliente = mysqli_fetch_array($cliente);
            $consultarconsumo = mysqli_query("SELECT * FROM lectura where num_cuenta='$Datos[num_cuenta]' AND cobro!='v'");
            $DatosConsumo = mysqli_fetch_array($consultarconsumo);
            $arrays_num_cuenta[$n] = $Datos["num_cuenta"];
            $bgcolor1 = " '#CED8F6' "; // color sobre seleccion 
            $bgcolor2 = " '#ffffff' ";// color original blanco 
            $bgcolor3 = " '#EEE9FD' ";// color original 2
            echo '<tr '; 
            if ($num_fila%2==0) 
            echo 'bgcolor=#ffffff onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor2.';"' ; //si el resto de la división es 0 pongo un color 
                else 
                    echo 'bgcolor=#EEE9FD onmouseover="this.style.backgroundColor= '.$bgcolor1.'; " onmouseout="this.style.backgroundColor= '.$bgcolor3.';"'; //si el resto de la división NO es 0 pongo otro color 
                    echo '> '; 
                    echo"
                    <td></td>
                    <td width='6%'>$n</td>
                    <td width='7%'>".mes_letras($DatosConsumo[mes])."</td>
                    <td width='7%'> $DatosConsumo[anio]</td>
                    <td width='20%'>$cliente[nombre]</td>
                    <td width='20%'>$cliente[apellido]</td>    
                    <td width='10%'>$Datos[num_cuenta]</td>
                    <td width='15%'>$DatosConsumo[lectura_actual]</td>
                    <td width='20%'>
                    <input type='number' name='lectura_actual$n' min='1' maxlength='10' class='textbox' style='width:105px;' required >
                    </td>
                    </tr>
                    <input type='hidden' name='num_cuenta$n' value='$Datos[cod_cuenta]'>
                    <input type='hidden' name='lectura_anterior$n' value='$DatosConsumo[lectura_actual]'>
                    <input type='hidden' name='n' value='$n'>
                    ";
                    $num_fila++; 
			}
                        }
			?>
			</table>

<?php mysqli_close(); ?>